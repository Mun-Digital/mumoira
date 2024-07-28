<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-auth.js"></script>
</head>
<body>

<!-- Modal Xác thực OTP -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="authModalLabel">Xác thực OTP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="recaptcha-container"></div>
                <!-- Phần nhập mã OTP -->
                <div id="otp-section" style="display: none;">
                    <p>Nhập mã hệ thống đã gửi về số điện thoại <strong id="phone-display"></strong></p>
                    <input type="text" class="form-control mb-3" placeholder="Nhập mã OTP" id="otp-code" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="btn-action">Gửi OTP</button>
                <button type="button" class="btn btn-primary" id="verify-otp" style="display: none;">Xác nhận</button>
            </div>
        </div>
    </div>
</div>

<!-- Form đăng ký -->
<form id="registerForm">
    <input type="text" id="username" placeholder="Tên đăng nhập">
    <input type="text" id="phone" placeholder="Số điện thoại">
    <input type="password" id="password" placeholder="Mật khẩu">
    <input type="password" id="repassword" placeholder="Nhập lại mật khẩu">
    <button type="button" id="btnRegister">Đăng Ký</button>
</form>

<script type="text/javascript">
$(document).ready(function() {
    // Initialize Firebase
    const firebaseConfig = {
       apiKey: "AIzaSyBY3WIbQDsn9JZXhxubWc4geNS_4ikxWKs",
       authDomain: "server-sms-ebdf3.firebaseapp.com",
       projectId: "server-sms-ebdf3",
       storageBucket: "server-sms-ebdf3.appspot.com",
       messagingSenderId: "833015955286",
       appId: "1:833015955286:web:0feeefeadd7e9de79aa0f7",
       measurementId: "G-8GGL69LNXG"
    };
    firebase.initializeApp(firebaseConfig);
    const auth = firebase.auth();
    let recaptchaVerifier;

    // Khi modal được hiển thị, khởi tạo reCAPTCHA
    $('#authModal').on('shown.bs.modal', function() {
        recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
            'size': 'normal',
            'callback': (response) => {
                console.log("reCAPTCHA verified");
            }
        });
        recaptchaVerifier.render().then(function(widgetId) {
            window.recaptchaWidgetId = widgetId;
        });
    });

    $("#btnRegister").on("click", function(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của nút
        $('#btnRegister').html('<i class="fa fa-spinner fa-spin"></i> Loading...').prop('disabled', true);
        
        $.ajax({
            url: "<?=base_url('ajaxs/client/register.php');?>",
            method: "POST",
            dataType: "JSON",
            data: {
                type: "send",
                username: $("#username").val(),
                phone: $("#phone").val(),
                password: $("#password").val(),
                repassword: $("#repassword").val()
            },
            success: function(response) {
                if (response.status == 'success') {
                    $("#authModal").modal('show');
                    $("#phone-display").text($("#phone").val());
                } else {
                    alert(response.message);
                }
                $('#btnRegister').html('Đăng Ký').prop('disabled', false);
            },
            error: function() {
                alert('Không thể xử lý');
                $('#btnRegister').html('Đăng Ký').prop('disabled', false);
            }
        });
    });

    $("#btn-action").on("click", function(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của nút
        sendOTP();
    });

    $("#verify-otp").on("click", function(event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của nút
        verifyOTP();
    });

    function sendOTP() {
        const phoneNumber = "+84" + $("#phone").val().slice(1); // Số điện thoại của người dùng
        const appVerifier = recaptchaVerifier;

        auth.signInWithPhoneNumber(phoneNumber, appVerifier)
            .then((confirmationResult) => {
                // SMS sent
                window.confirmationResult = confirmationResult;
                console.log("OTP sent");
                $("#otp-section").show();
                $("#btn-action").hide();
                $("#verify-otp").show();
            }).catch((error) => {
                console.error("Error during signInWithPhoneNumber", error);
            });
    }

    function verifyOTP() {
        const code = document.getElementById("otp-code").value;
        window.confirmationResult.confirm(code).then((result) => {
            const user = result.user;
            console.log("User signed in successfully:", user);
        }).catch((error) => {
            console.error("Error during OTP verification", error);
        });
    }
});
</script>

</body>
</html>
