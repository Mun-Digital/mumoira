<?php
$body = [
    'title' => 'Cài đặt hệ thống',
    'desc'   => '',
    'keyword' => ''
];
$body['header'] = '
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="'.BASE_URL('public/AdminLTE3/').'plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- CodeMirror -->
<link rel="stylesheet" href="'.BASE_URL('public/AdminLTE3/').'plugins/codemirror/codemirror.css">
<link rel="stylesheet" href="'.BASE_URL('public/AdminLTE3/').'plugins/codemirror/theme/monokai.css">
<!-- ckeditor -->
<script src="'.BASE_URL('public/ckeditor/ckeditor.js').'"></script>
<!-- Select2 -->
<link rel="stylesheet" href="'.BASE_URL('public/AdminLTE3/').'plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="'.BASE_URL('public/AdminLTE3/').'plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
';
$body['footer'] = '
<!-- bootstrap color picker -->
<script src="'.BASE_URL('public/AdminLTE3/').'plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- CodeMirror -->
<script src="'.BASE_URL('public/AdminLTE3/').'plugins/codemirror/codemirror.js"></script>
<script src="'.BASE_URL('public/AdminLTE3/').'plugins/codemirror/mode/css/css.js"></script>
<script src="'.BASE_URL('public/AdminLTE3/').'plugins/codemirror/mode/xml/xml.js"></script>
<script src="'.BASE_URL('public/AdminLTE3/').'plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- Select2 -->
<script src="'.BASE_URL('public/AdminLTE3/').'plugins/select2/js/select2.full.min.js"></script>
<script>
$(function () {
    $(".select2").select2()
    $(".select2bs4").select2({
        theme: "bootstrap4"
    });
});
</script>
';
require_once(__DIR__.'/../../../models/is_admin.php');
require_once(__DIR__.'/header.php');
require_once(__DIR__.'/sidebar.php');
require_once(__DIR__.'/nav.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=BASE_URL('admin/');?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php
    if (isset($_POST['SaveSettings'])) {
        foreach ($_POST as $key => $value) {
            $DB->update("settings", array(
                'value' => $value
            ), " `name` = '$key' ");
        }
        die('<script type="text/javascript">if(!alert("Lưu thành công !")){window.history.back().location.reload();}</script>');
    } ?>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12">
                    <div class="card card-dark card-tabs">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                                        href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                                        aria-selected="true">THÔNG TIN CHUNG</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="bot-telegram-tab" data-toggle="pill" href="#bot-telegram"
                                        role="tab" aria-controls="bot-telegram" aria-selected="false">BOT TELEGRAM</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-three-profile" role="tab"
                                        aria-controls="custom-tabs-three-profile" aria-selected="false">NGÂN HÀNG VN AUTO</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                                        href="#tab3" role="tab" aria-controls="custom-tabs-three-profile"
                                        aria-selected="false">MOMO AUTO</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                                        href="#tab7" role="tab" aria-controls="custom-tabs-three-profile"
                                        aria-selected="false">NẠP THẺ AUTO</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel"
                                    aria-labelledby="custom-tabs-three-home-tab">
                                    <form action="" method="POST">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Title (tiêu đề khi share lên mạng xã
                                                        hội)</label>
                                                    <input type="text" class="form-control" name="title"
                                                        value="<?=$DB->site('title');?>" placeholder="VD: NAMANH">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Description</label>
                                                    <input type="text" class="form-control" name="description"
                                                        value="<?=$DB->site('description');?>"
                                                        placeholder="VD: Ads">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Keywords</label>
                                                    <input type="text" class="form-control" name="keywords"
                                                        value="<?=$DB->site('keywords');?>"
                                                        placeholder="VD: ADS">
                                                </div>
                                            </div>
                                
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control select2bs4" name="status">
                                                        <option <?=$DB->site('status') == 1 ? 'selected' : '';?>
                                                            value="1">ON
                                                        </option>
                                                        <option <?=$DB->site('status') == 0 ? 'selected' : '';?>
                                                            value="0">
                                                            OFF
                                                        </option>
                                                    </select>
                                                    <i>Chọn OFF website sẽ bật chế độ bảo trì, ADMIN truy cập bình
                                                        thường.</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Status Update</label>
                                                    <select class="form-control select2bs4" name="status_update">
                                                        <option
                                                            <?=$DB->site('status_update') == 1 ? 'selected' : '';?>
                                                            value="1">ON
                                                        </option>
                                                        <option
                                                            <?=$DB->site('status_update') == 0 ? 'selected' : '';?>
                                                            value="0">
                                                            OFF
                                                        </option>
                                                    </select>
                                                    <i>Chọn OFF website sẽ tắt chế độ cập nhật phiên bản tự động</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Status Captcha</label>
                                                    <select class="form-control select2bs4" name="status_captcha">
                                                        <option
                                                            <?=$DB->site('status_captcha') == 1 ? 'selected' : '';?>
                                                            value="1">ON
                                                        </option>
                                                        <option
                                                            <?=$DB->site('status_captcha') == 0 ? 'selected' : '';?>
                                                            value="0">
                                                            OFF
                                                        </option>
                                                    </select>
                                                    <i>Chọn OFF website sẽ tắt Captcha chống SPAM</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Hotline</label>
                                                    <input type="text" class="form-control" name="hotline"
                                                        value="<?=$DB->site('hotline');?>"
                                                        placeholder="Số điện thoại liên hệ">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                        value="<?=$DB->site('email');?>" placeholder="Email liên hệ">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Thời gian lưu phiên đăng
                                                        nhập</label>
                                                    <input type="number" class="form-control" name="session_login"
                                                        value="<?=$DB->site('session_login');?>"
                                                        placeholder="Nhập thời gian lưu phiên đăng nhập">
                                                    <i>Tính bằng giây (<?=$DB->site('session_login');?> =
                                                        <?=timeAgo2($DB->site('session_login'));?>)</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Số tiền nạp tối thiểu</label>
                                                    <input type="number" class="form-control" name="min_recharge"
                                                        value="<?=$DB->site('min_recharge');?>"
                                                        placeholder="VD 10000">
                                                    <i>Số tiền nạp tối thiểu để được tạo hoá đơn nạp tiền.</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Thời gian hết hạn hoá đơn</label>
                                                    <input type="number" class="form-control" name="invoice_expiration"
                                                        value="<?=$DB->site('invoice_expiration');?>"
                                                        placeholder="VD 86400">
                                                    <i>VD <?=$DB->site('invoice_expiration');?> tức hoá đơn nạp tiền
                                                        sẽ tồn
                                                        tại trong
                                                        <?=timeAgo2($DB->site('invoice_expiration'));?>.</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Hiệu ứng nhấp chuột</label>
                                                    <select class="form-control select2bs4" name="mouse_click_effect">
                                                        <option
                                                            <?=$DB->site('mouse_click_effect') == 0 ? 'selected' : '';?>
                                                            value="0">Tắt hiệu ứng</option>
                                                        <option
                                                            <?=$DB->site('mouse_click_effect') == 1 ? 'selected' : '';?>
                                                            value="1">Hiệu ứng 1</option>
                                                        <option
                                                            <?=$DB->site('mouse_click_effect') == 2 ? 'selected' : '';?>
                                                            value="2">Hiệu ứng 2</option>
                                                        <option
                                                            <?=$DB->site('mouse_click_effect') == 3 ? 'selected' : '';?>
                                                            value="3">Hiệu ứng 3</option>
                                                        <option
                                                            <?=$DB->site('mouse_click_effect') == 4 ? 'selected' : '';?>
                                                            value="4">Hiệu ứng 4</option>
                                                        <option
                                                            <?=$DB->site('mouse_click_effect') == 5 ? 'selected' : '';?>
                                                            value="5">Hiệu ứng 5</option>
                                                        <option
                                                            <?=$DB->site('mouse_click_effect') == 6 ? 'selected' : '';?>
                                                            value="6">Hiệu ứng 6</option>
                                                    </select>
                                                    <i>Hiệu ứng khi nhấp chuột trong trang khách.</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Font Family</label>
                                                    <input type="text" class="form-control" name="font_family"
                                                        value="<?=$DB->site('font_family');?>">
                                                    <i><a type="button" data-toggle="modal"
                                                            data-target="#modal-hd-font-family" href="#">Hướng dẫn</a>
                                                        thay font website</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>ON/OFF Document API</label>
                                                    <select class="form-control select2bs4" name="display_api">
                                                        <option <?=$DB->site('display_api') == 1 ? 'selected' : '';?>
                                                            value="1">Hiển thị</option>
                                                        <option <?=$DB->site('display_api') == 0 ? 'selected' : '';?>
                                                            value="0">Ẩn</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>ON/OFF Menu Liên Hệ</label>
                                                    <select class="form-control select2bs4" name="display_contact">
                                                        <option
                                                            <?=$DB->site('display_contact') == 1 ? 'selected' : '';?>
                                                            value="1">Hiển thị</option>
                                                        <option
                                                            <?=$DB->site('display_contact') == 0 ? 'selected' : '';?>
                                                            value="0">Ẩn</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Timezone</label>
                                                    <input type="text" class="form-control" name="timezone"
                                                        value="<?=$DB->site('timezone');?>"
                                                        placeholder="VD: Asia/Ho_Chi_Minh">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Giới hạn số tài khoản đăng ký trên 1 IP</label>
                                                    <input type="number" class="form-control" name="max_register_ip"
                                                        value="<?=$DB->site('max_register_ip');?>">
                                                    <i>VD: <?=$DB->site('max_register_ip');?> => mỗi IP chỉ được tạo tối đa <?=$DB->site('max_register_ip');?> tài khoản</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Mã PIN Cron Job</label>
                                                    <input type="number" class="form-control" name="pin_cron"
                                                        value="<?=$DB->site('pin_cron');?>">
                                                    <p>Nếu bạn đặt mã PIN, các liên kết CRON sẽ phải chèn thêm đoạn <b>in đậm</b> <?=base_url('cron/');?>...php<b style="font-size: 15px;">?pin=<?=$DB->site('pin_cron');?></b> vào liên kết để tránh spam, để trống nếu không dùng chức năng này.</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Script Header</label>
                                                    <textarea id="codeMirrorDemo"
                                                        placeholder="Chứa code live chat hoặc jquery trang trí..."
                                                        name="javascript_header"><?=$DB->site('javascript_header');?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Script Footer</label>
                                                    <textarea id="codeMirrorDemo2"
                                                        placeholder="Chứa code live chat hoặc jquery trang trí..."
                                                        name="javascript"><?=$DB->site('javascript');?></textarea>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <button name="SaveSettings" class="btn btn-info btn-block btn-icon-left m-b-10"
                                            type="submit"><i class="fas fa-save mr-1"></i>Lưu Ngay</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="bot-telegram" role="tabpanel"
                                    aria-labelledby="bot-telegram-tab">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label>Loại thông báo</label>
                                            <select class="form-control select2bs4" name="type_notification">
                                                <option
                                                    <?=$DB->site('type_notification') == 'telegram' ? 'selected' : '';?>
                                                    value="telegram">Telegram
                                                </option>
                                                <option
                                                    <?=$DB->site('type_notification') == 'off' ? 'selected' : '';?>
                                                    value="off">OFF
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Token Telegram (<a target="_blank"
                                                    href="https://cmsnt.vn/2022/05/huong-dan-cau-hinh-bot-thong-bao-qua-telegram/">Xem
                                                    hướng dẫn</a>)</label>
                                            <input type="text" class="form-control" name="token_telegram"
                                                value="<?=$DB->site('token_telegram');?>"
                                                placeholder="5323330732:AAFpurxAdW9vGGPE_cZ2gU_kDP-__kAsOVc">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Chat ID Telegram (<a target="_blank"
                                                    href="https://cmsnt.vn/2022/05/huong-dan-cau-hinh-bot-thong-bao-qua-telegram/">Xem
                                                    hướng dẫn</a>)</label>
                                            <input type="text" class="form-control" name="chat_id_telegram"
                                                value="<?=$DB->site('chat_id_telegram');?>" placeholder="-788267800">
                                        </div>
                                        <button name="SaveSettings" class="btn btn-info btn-icon-left btn-block m-b-10"
                                            type="submit"><i class="fas fa-save mr-1"></i>Lưu Ngay</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                                    aria-labelledby="custom-tabs-three-profile-tab">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control select2bs4" name="status_bank">
                                                <option <?=$DB->site('status_bank') == 0 ? 'selected' : '';?>
                                                    value="0">OFF
                                                </option>
                                                <option <?=$DB->site('status_bank') == 1 ? 'selected' : '';?>
                                                    value="1">ON
                                                </option>
                                            </select>
                                            <i>Chọn OFF hệ thống sẽ tạm dừng auto bank.</i>
                                        </div>
                                        <div class="form-group">
                                            <label>Server 1</label>
                                            <select class="form-control select2bs4" name="sv1_autobank">
                                                <option '' value="0">OFF</option>
                                                <option '' value="1">ON</option>
                                            </select>
                                            <i>Nạp tiền bằng hoá đơn, quét QR code...</i><br>
                                        </div>
                                        <div class="form-group">
                                            <label>Server 2</label>
                                            <select class="form-control select2bs4" name="sv2_autobank">
                                                <option '' value="0">OFF</option>
                                                <option '' value="1">ON</option>
                                            </select>
                                            <i>Nạp tiền theo nội dung + id, quét QR code...</i><br>
                                        </div>
                                        <div class="form-group">
                                            <label>Ngân hàng</label>
                                            <select class="form-control select2bs4" name="type_bank">
                                                <?php foreach ($DB->get_list("SELECT * FROM `bank_list` WHERE `type` = 'auto' ") as $bank) {?>
                                                <option <?=$DB->site('type_bank') == $bank['bank_id'] ? 'selected' : '';?>
                                                    value="<?=$bank['bank_id'];?>"><?=$bank['bank_name'];?>
                                                </option>
                                                <?php }?>
                                            </select>
                                            <i>Chọn ngân hàng bạn cần sử dụng.</i>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Token Bank (<a type="button"
                                                    data-toggle="modal" data-target="#modal-hd-auto-bank" href="#">Xem
                                                    hướng dẫn</a>)</label>
                                            <input type="text" class="form-control" name="token_bank"
                                                value="<?=$DB->site('token_bank');?>"
                                                placeholder="Nhập token ngân hàng">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Số tài khoản (<a type="button"
                                                    data-toggle="modal" data-target="#modal-hd-auto-bank" href="#">Xem
                                                    hướng dẫn</a>)</label>
                                            <input type="text" class="form-control" name="stk_bank"
                                                value="<?=$DB->site('stk_bank');?>"
                                                placeholder="Nhập số tài khoản ngân hàng cần Auto">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mật khẩu Internet Banking (<a type="button"
                                                    data-toggle="modal" data-target="#modal-hd-auto-bank" href="#">Xem
                                                    hướng dẫn</a>)</label>
                                            <input type="text" class="form-control" name="mk_bank"
                                                value="<?=$DB->site('mk_bank');?>"
                                                placeholder="Nhập mật khẩu internet banking">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nội dung nạp</label>
                                            <input type="text" class="form-control" name="prefix_autobank"
                                                value="<?=$DB->site('prefix_autobank');?>"
                                                placeholder="Tiền tố nội dung nạp tiền">
                                            <i>Chỉ áp dụng cho server 2</i>
                                        </div>
                                        <button name="SaveSettings" class="btn btn-info btn-icon-left btn-block m-b-10"
                                            type="submit"><i class="fas fa-save mr-1"></i>Lưu Ngay</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control select2bs4" name="status_momo">
                                                <option <?=$DB->site('status_momo') == 0 ? 'selected' : '';?>
                                                    value="0">OFF
                                                </option>
                                                <option <?=$DB->site('status_momo') == 1 ? 'selected' : '';?>
                                                    value="1">ON
                                                </option>
                                            </select>
                                            <i>Chọn OFF hệ thống sẽ tạm dừng auto momo.</i>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Token MOMO (<a type="button"
                                                    data-toggle="modal" data-target="#modal-hd-auto-momo" href="#">Xem
                                                    hướng dẫn</a>)</label>
                                            <input type="text" class="form-control" name="token_momo"
                                                value="<?=$DB->site('token_momo');?>"
                                                placeholder="Nhập token ví momo">
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputEmail1">SDT MOMO </label>
                                            <input type="text" class="form-control" name="sdt_momo"
                                                value="<?=$DB->site('sdt_momo');?>"
                                                placeholder="Nhập sdt ví momo">
                                        </div>

                                        <!-- <div class="form-group">
                                            <label for="exampleInputEmail1">QR CODE (<a type="button"
                                                    data-toggle="modal" data-target="#modal-hd-auto-momo" href="#">Xem
                                                    hướng dẫn</a>)</label>
                                            <input type="text" class="form-control" name="qr_momo"
                                                value=""
                                                placeholder="Nhập link ảnh QRCODE">
                                        </div> -->
                                        <button name="SaveSettings" class="btn btn-info btn-block btn-icon-left m-b-10"
                                            type="submit"><i class="fas fa-save mr-1"></i>Lưu Ngay</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="tab7" role="tabpanel" aria-labelledby="tab7">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control select2bs4" name="status_napthe">
                                                <option <?=$DB->site('status_napthe') == 0 ? 'selected' : '';?>
                                                    value="0">OFF
                                                </option>
                                                <option <?=$DB->site('status_napthe') == 1 ? 'selected' : '';?>
                                                    value="1">ON
                                                </option>
                                            </select>
                                            <i>Chọn OFF hệ thống sẽ tạm dừng nạp thẻ.</i>
                                        </div>
                                        <div class="form-group">
                                            <label>Partner ID (<a type="button" data-toggle="modal"
                                                    data-target="#modal-hd-nap-the" href="#">Xem hướng dẫn</a>)</label>
                                            <input type="text" name="partner_id_card"
                                                value="<?=$DB->site('partner_id_card');?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Partner Key (<a type="button" data-toggle="modal"
                                                    data-target="#modal-hd-nap-the" href="#">Xem hướng dẫn</a>)</label>
                                            <input type="text" name="partner_key_card"
                                                value="<?=$DB->site('partner_key_card');?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Phí Nạp Thẻ</label>
                                            <input type="text" class="form-control" name="ck_napthe"
                                                value="<?=$DB->site('ck_napthe');?>"
                                                placeholder="Nhập phí nạp thẻ nếu có nạp thẻ">
                                            <i>Để <?=$DB->site('ck_napthe');?> tức khách nạp 100.000đ sẽ được
                                                <?=format_cash(100000 - 100000 * $DB->site('ck_napthe') / 100);?></i><br>
                                            <i>Để phí = 0 nếu quý khách muốn cộng cho user giống thực nhận tại hệ thống
                                                card24h.com</i>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ghi chú nạp thẻ</label>
                                            <textarea id="notice_napthe"
                                                name="notice_napthe"><?=$DB->site('notice_napthe');?></textarea>
                                        </div>
                                        <button name="SaveSettings" class="btn btn-info btn-block btn-icon-left m-b-10"
                                            type="submit"><i class="fas fa-save mr-1"></i>Lưu Ngay</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>


                <section class="col-lg-12 connectedSortable">
                    <form action="" method="POST">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-cogs mr-1"></i>
                                    CẤU HÌNH NỘI DUNG
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn bg-warning btn-sm" data-card-widget="maximize"><i
                                            class="fas fa-expand"></i>
                                    </button>
                                    <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thông báo toàn hệ thống</label>
                                    <textarea id="thongbao" name="thongbao"><?=$DB->site('thongbao');?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ghi chú nạp tiền</label>
                                    <textarea id="recharge_notice"
                                        name="recharge_notice"><?=$DB->site('recharge_notice');?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chính sách bảo mật</label>
                                    <textarea id="chinh_sach_bao_mat"
                                        name="chinh_sach_bao_mat"><?=$DB->site('chinh_sach_bao_mat');?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Điều khoản sử dụng</label>
                                    <textarea id="dieu_khoan_su_dung"
                                        name="dieu_khoan_su_dung"><?=$DB->site('dieu_khoan_su_dung');?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trang liên hệ</label>
                                    <textarea id="contact_page"
                                        name="contact_page"><?=$DB->site('contact_page');?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thông báo nổi</label>
                                    <textarea id="notice_popup"
                                        name="notice_popup"><?=$DB->site('notice_popup');?></textarea>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <button name="SaveSettings" class="btn btn-info btn-block btn-icon-left m-b-10"
                                    type="submit"><i class="fas fa-save mr-1"></i>Lưu Ngay</button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<div class="modal fade" id="modal-hd-font-family">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">HƯỚNG DẪN THAY FONT WEBSITE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Bước 1: Truy cập vào <a target="_blank"
                            href="https://fonts.google.com/">https://fonts.google.com/</a> tìm và chọn FONT quý khách
                        cần thay.</li>
                    <li>Bước 2: Quý khách nhấn vào FONT quý khách chọn sau đó để ý bên tay phải màn hình có ô <b>Use on
                            the web</b>.</li>
                    <li>Bước 3: Quý khách tích vào <b>
                            < link>
                        </b> và copy toàn bộ dữ liệu trong ô.</li>
                    <li>Bước 4: Quý khách chèn dữ liệu đã copy phía trên vào ô <b>Script Header</b> trên website quý
                        khách.</li>
                    <li>Bước 5: Quý khách nhìn vào ô <b>CSS rules to specify families</b> - Copy 1 dòng
                        <b>font-family</b> quý khách muốn chọn và dán vào ô trên (không bắt buộc thao tác này, tuỳ nhu
                        cầu).
                    </li>
                </ul>
                <h4 class="text-center">Chúc quý khách thành công <img
                        src="https://i.pinimg.com/736x/c4/2c/98/c42c983e8908fdbd6574c2135212f7e4.jpg" width="45px;">
                </h4>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-hd-nap-the">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">HƯỚNG DẪN TÍCH HỢP NẠP THẺ CÀO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Bước 1: Truy cập vào <a target="_blank"
                            href="https://card24h.com/account/login">https://card24h.com/account/login</a> <b>đăng
                            ký</b> tài khoản và <b>đăng nhập</b>.</li>
                    <li>Bước 2: Truy cập vào <a target="_blank" href="https://card24h.com/merchant/list">đây</a> để tiến
                        hành tạo API mới.</li>
                    <li>Bước 3: Nhập lần lượt như sau:</li>
                    <b>Tên mô tả:</b> => <i><?=check_string($_SERVER['SERVER_NAME']);?> - SHOPCLONE6</i><br>
                    <b>Chọn ví giao dịch:</b> => <i>VND</i><br>
                    <b>Kiểu:</b> => <i>GET</i><br>
                    <b>Đường dẫn nhận dữ liệu (Callback Url):</b> => <i><?=BASE_URL('api/card.php');?></i><br>
                    <b>Địa chỉ IP (không bắt buộc):</b> => <i></i><br>
                    <li>Bước 4: Thêm thông tin kết nối và <a target="_blank" href="https://zalo.me/0947838128">inbox</a>
                        ngay cho Admin để duyệt API.</li>
                    <li>Bước 5: Copy Partner ID dán vào ô Partner ID trên hệ thống.</li>
                    <li>Bước 6: Copy Partner Key dán vào ô Partner Key trên hệ thống.</li>
                </ul>
                <h4 class="text-center">Chúc quý khách thành công <img
                        src="https://i.pinimg.com/736x/c4/2c/98/c42c983e8908fdbd6574c2135212f7e4.jpg" width="45px;">
                </h4>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-hd-crypto">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">HƯỚNG DẪN TÍCH HỢP NẠP TIỀN TỰ ĐỘNG QUA CRYPTO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Bước 1: Truy cập vào <a target="_blank"
                            href="https://fpayment.co/client/register">đây</a> để <b>đăng ký</b> tài khoản và
                        <b>đăng nhập</b>.
                    </li>
                    <li>Bước 2: Truy cập vào <a target="_blank"
                            href="https://fpayment.co/client/wallets">đây</a> để thêm ví Tron vào hệ thống.
                    </li>
                    <li>Bước 3: Sau khi thêm ví Tron thành công, quý khách Copy <b>Token</b> và <b>Address</b> vào Admin.</li>
                    <li>Bước 4: Vui lòng nạp số dư duy trì vào FPAYMENT.CO trước để giao dịch được tự động.</li>
                </ul>
                </ul>
                <p>Hướng dẫn chi tiết tại <a target="_blank"
                        href="https://www.cmsnt.co/2023/02/huong-dan-tich-hop-nap-tien-tu-ong-bang.html">đây</a>.</p>
                <h4 class="text-center">Chúc quý khách thành công <img
                        src="https://i.pinimg.com/736x/c4/2c/98/c42c983e8908fdbd6574c2135212f7e4.jpg" width="45px;">
                </h4>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-hd-auto-bank">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">HƯỚNG DẪN TÍCH HỢP NẠP TIỀN TỰ ĐỘNG QUA NGÂN HÀNG</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Bước 1: Truy cập vào <a target="_blank"
                            href="https://api.web2m.com/Register.html?ref=113">đây</a> để <b>đăng ký</b> tài khoản và
                        <b>đăng nhập</b>.
                    </li>
                    <li>Bước 2: Chọn ngân hàng bạn muốn kết nối Auto, sau đó nhấn vào nút <b>Thêm tài khoản {tên ngân
                            hàng}</b>.</li>
                    <li>Bước 3: Nhập đầy đủ thông tin đăng nhập Internet Banking của bạn vào form để tiến hành kết nối.
                    </li>
                    <li>Bước 4: Nhấn vào <b>Lấy Token</b> sau đó check email để copy <b>Token</b> vừa lấy.</li>
                    <li>Bước 5: Dán <b>Token</b> vào ô <b>Token Bank</b> trong website của bạn.</li>
                    <li>Bước 6: Nhập số tài khoản của bạn vừa kết nối vào ô <b>Số tài khoản</b>.</li>
                    <li>Bước 7: Nhập mật khẩu Internet Banking vào ô <b>Mật khẩu Internet Banking</b> và nhấn lưu.</li>
                    <li>Bước 8: Quay lại <a target="_blank" href="https://api.web2m.com/Home/nangcap">đây</a> và tiến
                        hành gia hạn gói Bank mà bạn cần dùng để bắt đầu sử dụng Auto.</li>
                </ul>
                <p>Hướng dẫn bằng Video xem tại <a target="_blank"
                        href="https://www.youtube.com/watch?v=N8CuOJTD6l8">đây</a>.</p>
                <h4 class="text-center">Chúc quý khách thành công <img
                        src="https://i.pinimg.com/736x/c4/2c/98/c42c983e8908fdbd6574c2135212f7e4.jpg" width="45px;">
                </h4>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-hd-auto-momo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">HƯỚNG DẪN TÍCH HỢP NẠP TIỀN TỰ ĐỘNG QUA VÍ MOMO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Hướng dẫn lấy Token MOMO để cài Auto.</p>
                <ul>
                    <li>Bước 1: Truy cập vào <a target="_blank"
                            href="https://api.web2m.com/Register.html?ref=113">đây</a> để <b>đăng ký</b> tài khoản và
                        <b>đăng nhập</b>.
                    </li>
                    <li>Bước 2: Chọn ngân hàng bạn muốn kết nối Auto, sau đó nhấn vào nút <b>Thêm tài khoản MoMo</b>.
                    </li>
                    <li>Bước 3: Nhập đầy đủ thông tin đăng nhập MoMo của bạn vào form để tiến hành kết nối.</li>
                    <li>Bước 4: Nhấn vào <b>Lấy Token</b> sau đó check email để copy <b>Token</b> vừa lấy.</li>
                    <li>Bước 5: Dán <b>Token</b> vào ô <b>Token MOMO</b> trong website của bạn và nhấn Lưu.</li>
                    <li>Bước 6: Quay lại <a target="_blank" href="https://api.web2m.com/Home/nangcap">đây</a> và tiến
                        hành gia hạn gói MOMO và bắt đầu sử dụng Auto.</li>
                    <li>Hướng dẫn bằng Video xem tại <a target="_blank"
                            href="https://www.youtube.com/watch?v=5WRqOmxzBPc">đây</a>.</li>
                </ul>
                <!-- <p>Hướng dẫn lấy mã QR MOMO</p>
                <ul>
                    <li>Bước 1: Truy cập App <b>MOMO</b> -> <b>Ví của tôi</b> -> nhấn vào <b>Tên Chủ Ví</b> ở dòng đầu
                        tiên trong ví MOMO của bạn.</li>
                    <li>Bước 2: Kéo xuống dưới cùng chọn <b>Mã NHẬN TIỀN của tôi</b> -> nhấn <b>lưu hình</b>.</li>
                    <li>Bước 3: Sau khi lưu hình bạn vào <a target="_blank" href="https://imgur.com/upload?beta">đây</a>
                        để up hình vừa lưu lên cloud.</li>
                    <li>Bước 4: Sau khi up lên cloud imgur bạn rê chuột phải vào ảnh chọn <b>copy địa chỉ hình ảnh</b>
                        (hoặc tiếng anh có nghĩa tương tự) để tiến hành copy link ảnh .jpg hoặc .png.</li>
                    <li>Bước 5: Dán link ảnh vừa copy vào ô <b>QR CODE</b>.</li>
                </ul> -->
                <h4 class="text-center">Chúc quý khách thành công <img
                        src="https://i.pinimg.com/736x/c4/2c/98/c42c983e8908fdbd6574c2135212f7e4.jpg" width="45px;">
                </h4>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
$(function() {
    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })
    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
    });
    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo2"), {
        mode: "htmlmixed",
        theme: "monokai"
    });
    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("marquee_notication_shopacc"), {
        mode: "htmlmixed",
        theme: "monokai"
    });
    
})
</script>
<!-- ckeditor -->
<script>
CKEDITOR.replace("notice_toyyibpay");
CKEDITOR.replace("notice_popup");
CKEDITOR.replace("notice_ref");
CKEDITOR.replace("perfectmoney_notice");
CKEDITOR.replace("notice_spin");
CKEDITOR.replace("notice_napthe");
CKEDITOR.replace("recharge_notice");
CKEDITOR.replace("paypal_notice");
CKEDITOR.replace("orders_notice");
CKEDITOR.replace("thongbao");
CKEDITOR.replace("contact_page");
CKEDITOR.replace("chinh_sach_bao_mat");
CKEDITOR.replace("dieu_khoan_su_dung");
CKEDITOR.replace("notice_crypto");
</script>


<?php
require_once(__DIR__.'/footer.php');
?>