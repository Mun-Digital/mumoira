<?php
$body = [
    'title' => 'Đăng Nhập - '.$DB->site('title'),
    'desc'   => $DB->site('description'),
    'keyword' => $DB->site('keywords')
];
$body['header'] = '';
$body['footer'] = '';
$token = isset($_SESSION['token']) ? $_SESSION['token'] : null;
if (!empty($token)){
    redirect(base_url(''));
}

require_once(__DIR__.'/header.php');
require_once(__DIR__.'/navbar.php');
?>


  <body>
    <section id="main">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <form
              method="post"
              id="form-login"
              class="wrap-login bg-white"
              action=""
              novalidate="novalidate"
            >
              <div class="title">ĐĂNG NHẬP</div>
              <div class="mb-3">
                <input
                  type="number"
                  class="form-control"
                  placeholder="Số điện thoại"
                  id="phone"
                  autocomplete="off"
                  required
                />
              </div>
              <div class="mb-4">
                <input
                  type="password"
                  class="form-control"
                  placeholder="Mật khẩu"
                  name="password"
                  id="password"
                  autocomplete="off"
                  required
                />
              </div>
              <div class="mb-3">
                <button class="btn btn-sm btn-login" id="btnlogin" type="submit">
                  ĐĂNG NHẬP
                </button>
              </div>
              <div class="mb-3">
                <a
                  class="btn btn-sm btn-refesh-password form-control"
                  href="quen-mat-khau.html"
                  >Quên mật khẩu?</a
                >
              </div>
              <div class="form-separator" data-reactid="17">
                <span data-reactid="18">hoặc</span>
              </div>
              <div class="mb-3">
                <div class="d-flex justify-content-between mb-3">
                  <div class="bd-highlight w-100 pl-1">
                    <a
                      class="btn btn-sm btn-success w-100 a-register"
                      href="register.php"
                      >Đăng ký</a
                    >
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

<script type="text/javascript">
$("#btnlogin").on("click", function() {
    $('#btnlogin').html('<i class="fa fa-spinner fa-spin"></i> Loading...').prop('disabled',
        true);
    $.ajax({
        url: "<?=base_url('ajaxs/client/login.php');?>",
        method: "POST",
        dataType: "JSON",
        data: {
            phone: $("#phone").val(),
            password: $("#password").val()
        },
        success: function(response) {
            if (response.status == 'success') {
                
                cuteToast({
                    type: "success",
                    message: response.message,
                    timer: 5000
                });
                setTimeout("location.href = '<?=base_url('client/home');?>'", 100);
            }
            else {
                cuteToast({
                    type: "error",
                    message: response.message,
                    timer: 5000
                });
            }
            $('#btnlogin').html('Đăng Nhập').prop('disabled', false);
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
<?php
require_once(__DIR__.'/footer.php');
?>