<?php
$body = [
    'title' => 'Đăng nhập quản trị',
    'desc'   => 'ok',
    'keyword' => 'ok'
];
$body['header'] = '';
$body['footer'] = '';
require_once(__DIR__.'/header.php');
?>
<link rel="stylesheet" href="<?=base_url('public/css/LoginAdmin.css');?>">
<div class="background-wrap">
    <div class="background"></div>
</div>
<form id="accesspanel" action="" method="post">
    <h1 id="litheader">ADMIN Panel</h1>
    <div class="inset">
        <p>
            <input type="text" name="phone" id="phone" placeholder="Số điện thoại">
        </p>
        <p>
            <input type="password" name="password" id="password" placeholder="Mật khẩu">
        </p>
        <div style="text-align: center;">
            <label>Vui lòng đăng nhập</label>
        </div>
    </div>
    <p class="p-container">
        <button class="btn-login" type="button" name="btnLogin" id="btnLogin">Login</button>
    </p>
</form>
<script type="text/javascript">
$("#btnLogin").on("click", function() {
    $('#btnLogin').html('<i class="fa fa-spinner fa-spin"></i> Loading...').prop('disabled',
        true);
    $.ajax({
        url: "<?=base_url('ajaxs/admin/login.php');?>",
        method: "POST",
        dataType: "JSON",
        data: {
            phone: $("#phone").val(),
            password: $("#password").val()
        },
        success: function(respone) {
            if (respone.status == 'success') {
                cuteToast({
                    type: "success",
                    message: respone.message,
                    timer: 5000
                });
                setTimeout("location.href = '<?=BASE_URL('admin/');?>';", 100);
            } 
            else {
                cuteToast({
                    type: "error",
                    message: respone.message,
                    timer: 5000
                });
            }
            $('#btnLogin').html('Login').prop('disabled', false);
        },
        error: function() {
            cuteToast({
                type: "error",
                message: 'Không thể xử lý',
                timer: 5000
            });
        }

    });
});
</script>