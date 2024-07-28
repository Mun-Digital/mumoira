<?php

$body = [
    'title' => 'Trang cá nhân - '.$DB->site('title'),
    'desc'   => $DB->site('description'),
    'keyword' => $DB->site('keywords')
];
$body['header'] = '';
$body['footer'] = '';
require_once(__DIR__.'/../../../models/is_user.php');
require_once(__DIR__.'/header.php');
require_once(__DIR__.'/navbar.php');
?>

<body>

    <section id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-8  mt-3 pb-3">
                    <div class="card  card-categories">
                        <div class="product-wrap">
                            <div class="d-flex justify-content-start tab-main tab-header">
                                <a class="ms-3 me-3 tab-item active" href="<?=base_url('client/home');?>">
                                    <i class="fa fa-user"></i>
                                    Thông tin cá nhân
                                </a>
                                <a class="ms-3 me-3 tab-item " href="<?=base_url('client/transaction');?>">
                                    <i class="fa fa-d-line"></i>
                                    Lịch sử giao dịch
                                </a>
                            </div>
                        </div>
                        <div class="card-body" id="profile">
                            <div class="row">
                                <div class="col-12 col-md-4 text-center">
                                    <div class="img-profile">
                                        <img class="file-upload-preview"
                                            src="<?=BASE_URL('assets/Content/images/icon/avataremty.png');?>">
                                    </div>
                                </div>
                                <div class="col-12 col-md-8">
                                    <form id="form-user" novalidate="novalidate">
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="txt_FullName">Họ và tên</label>
                                                <input type="text" class="form-control" id="txt_FullName"
                                                    name="fullName"
                                                    value="<?=$getUser['username'];?>"
                                                    readonly disabled="disabled">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="txt_PhoneNumber">Số điện thoại</label>
                                                <input readonly type="text" class="form-control" id="txt_PhoneNumber"
                                                    name="phone"
                                                    value="<?=$getUser['phone'];?>">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="password">Mật khẩu cũ</label>
                                                <input type="password" name="password" class="form-control"
                                                    id="password" value="">
                                                <small class="text-red">(Không được để trống)</small>
                                            </div>
                                            <!--mật khẩu mới-->
                                            <div class="col-md-12 mb-3">
                                                <label for="newpassword">Mật khẩu mới</label>
                                                <input type="password" name="newpassword" class="form-control"
                                                    id="newpassword" value="">
                                                <small class="text-red">(Không được để trống)</small>
                                            </div>
                                            <!--repassword-->
                                            <div class="col-md-12 mb-3">
                                                <label for="renewpassword">Nhập lại Mật khẩu mới</label>
                                                <input type="password" name="renewpassword" class="form-control"
                                                    id="renewpassword" value="">
                                                <small class="text-red">(Không được để trống)</small>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="alert alert-success alert-dismissible hide" role="alert"
                                                    id="alert">
                                                    <span class="content"></span>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="token" name="token" value="<?php echo htmlspecialchars($getUser['token']); ?>">
                                        <input type="hidden" id="txt_Avatar" name="name" value="">
                                        <button class="btn btn-success float-right" type="submit" id="btn-action"><i
                                                class="fa fa-edit"></i> Cập nhật thông tin</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mt-3">
                    <div class="bg-white p-3 coin-wrap mb-3">
                        <div class="coin-detail">
                            <div class="coin-img">
                                <img src="<?=BASE_URL('assets/Content/images/icon/coin.png');?>">
                            </div>
                            <div class="coin-info">
                                <div class="lb">Số dư tài khoản:</div>
                                <div class="vl"><?=format_cash($getUser['money']);?> Gold</div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <a class="btn btn-coin w-100" href="<?=base_url('client/nap-gold');?>"><i class="fas fa-credit-card"></i> Nạp tiền</a>
                        <div class="menu-cat-parent">
                            <div class="coins-value mt-3 ">
                                <a class="btn btn-category active" href="/client/profile">
                                  <span>
                                    <i class="fa fa-angle-right"></i>
                                    Thông tin cá nhân
                                  </span>
                                </a>
                                <a class="btn btn-category" href="/client/nap-gold">
                                    <span> <i class="fa fa-angle-right"></i>Nạp Gold vào tài khoản</span>
                                </a>
                                <a class="btn btn-category" href="/client/quan-ly-tin-dang">
                                    <span> <i class="fa fa-angle-right"></i>Quản lý tin đăng</span>
                                </a>
                                <a class="btn btn-category" href="<?=base_url('client/quan-ly-banner');?>">
                                    <span> <i class="fa fa-angle-right"></i>Quản lý banner</span>
                                </a>
                                <a class="btn btn-category" href="<?=base_url('client/transaction');?>">
                                    <span> <i class="fa fa-angle-right"></i>Lịch sử giao dịch</span>
                                </a>
                                <?php if ($getUser['admin'] == '1') { ?>
                                    <a class="btn btn-category" href="<?=base_url('admin/home');?>">
                                        <span> <i class="fa fa-angle-right"></i>Trang quản trị</span>
                                    </a>
                                <?php } ?>
                                <a class="btn btn-category logout" href="<?=base_url('client/logout');?>">
                                    <span><i class="fa fa-sign-out-alt"></i>Đăng xuất</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<script type="text/javascript">
    $(document).ready(function () {
        function handleFormSubmit(event) {
            event.preventDefault();
            $.ajax({
                url: '<?= base_url("ajaxs/client/profile.php"); ?>',
                method: 'POST',
                dataType: 'json',
                data: {
                    action: 'ChangePassword',
                    password: $('#password').val(),
                    newpassword: $('#newpassword').val(),
                    renewpassword: $('#renewpassword').val(),
                    token: $('#token').val()
                },
                success: handleResponse,
                error: handleError
            });
        }

        function handleResponse(response) {
            const alertBox = $('#alert');
            if (response.status === 'success') {
                showAlert(alertBox, 'alert-success', response.message);
            } else {
                showAlert(alertBox, 'alert-danger', response.message);
            }
        }
        function handleError() {
            const alertBox = $('#alert');
            showAlert(alertBox, 'alert-danger', 'Có lỗi xảy ra trong quá trình xử lý yêu cầu của bạn');
        }
        function showAlert(alertBox, alertClass, message) {
            alertBox.removeClass('hide').removeClass('alert-success alert-danger').addClass(alertClass);
            alertBox.find('.content').text(message);
        }
        $('#form-user').on('submit', handleFormSubmit);
    });

</script>


    <?php
require_once(__DIR__.'/footer.php');
?>