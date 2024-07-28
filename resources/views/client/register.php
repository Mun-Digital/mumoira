<?php
$body = [
    'title' => 'Đăng Ký - '.$DB->site('title'),
    'desc'   => $DB->site('description'),
    'keyword' => $DB->site('keywords')
];
$body['header'] = '';
$body['footer'] = '';

require_once(__DIR__.'/header.php');
require_once(__DIR__.'/navbar.php');
?>

<body>
<section id="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form id="registerForm" class="validate wrap-login bg-white" novalidate="novalidate">
                    <div class="title">ĐĂNG KÝ</div>
                    <div class="mb-3">
                        <input type="text" id="username" class="form-control" placeholder="Nhập User Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" id="phone" class="form-control" placeholder="Nhập số điện thoại" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="repassword" placeholder="Nhập lại mật khẩu" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-login form-control" id="btnRegister">ĐĂNG KÝ</button>
                    </div>
                    <div class="mb-3">
                        <a class="btn btn-sm btn-refesh-password form-control" href="<?=base_url('client/forgot-password');?>">Quên mật khẩu?</a>
                    </div>
                    <div class="form-separator" data-reactid="17"><span data-reactid="18">hoặc</span></div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between bd-highlight mb-3">
                            <div class="bd-highlight w-100 pl-1">
                                <a class="btn btn-sm btn-success w-100 a-register" href="<?=base_url('client/login');?>">Đăng nhập</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
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

<?php
require_once(__DIR__.'/footer.php');
?>
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

        $("#registerForm").on("submit", function(event) {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của form
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
                    $('#btnRegister').html('ĐĂNG KÝ').prop('disabled', false);
                },
                error: function() {
                    alert('Không thể xử lý');
                    $('#btnRegister').html('ĐĂNG KÝ').prop('disabled', false);
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
                    if (error.code === 'auth/session-expired') {
                        alert("Session expired. Please try again.");
                        recaptchaVerifier.reset();
                        initializeRecaptcha();
                    }
                });
        }

        function verifyOTP() {
            const code = document.getElementById("otp-code").value;
            window.confirmationResult.confirm(code).then((result) => {
                const user = result.user;
                console.log("User signed in successfully:", user);

                // Gửi dữ liệu qua AJAX đến server của bạn
                $.ajax({
                    url: "path_to_your_server_endpoint", // Thay bằng đường dẫn thực tế tới server của bạn
                    method: "POST",
                    data: {
                        phoneNumber: user.phoneNumber,
                        uid: user.uid
                    },
                    success: function(response) {
                        console.log("Server response:", response);
                        // Thực hiện các hành động sau khi xác thực thành công (nếu cần)
                    },
                    error: function(xhr, status, error) {
                        console.error("Error sending data to server:", error);
                    }
                });
            }).catch((error) => {
                console.error("Error during OTP verification", error);
            });
        }

        // Hàm khởi tạo lại reCAPTCHA nếu hết hạn
        function initializeRecaptcha() {
            recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
                'size': 'normal',
                'callback': (response) => {
                    console.log("reCAPTCHA verified");
                }
            });
            recaptchaVerifier.render().then(function(widgetId) {
                window.recaptchaWidgetId = widgetId;
            });
        }
    });
</script>
