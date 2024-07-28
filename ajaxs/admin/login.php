<?php

require_once(__DIR__."/../../libs/db.php");
require_once(__DIR__."/../../libs/helpers.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $DB = new DB();
    $phone = check_string($_POST['phone']);
    $password = check_string($_POST['password']);

    if (empty($phone)) {
        die(json_encode(['status' => 'error', 'message' => 'Số điện thoại không được để trống']));
    }
    if (empty($password)) {
        die(json_encode(['status' => 'error', 'message' => 'Mật khẩu không được để trống']));
    }
    if(getLocation(myip())['country'] != 'VN') {
        die(json_encode(['status' => 'error', 'message' => 'Không thể truy cập quản trị!']));
    }
    if (check_length_phone($phone) != true) {
        die(json_encode(['status' => 'error', 'message' => 'Độ dài số điện thoại không đúng']));
    }
    if (check_phone($phone) != true) {
        die(json_encode(['status' => 'error', 'message' => 'Định dạng số điện thoại không đúng']));
    }
    $getUser = $DB->get_row("SELECT * FROM `users` WHERE `phone` = '$phone' AND `admin` = 1 ");
    if (!$getUser) {
        die(json_encode(['status' => 'error', 'message' => 'Thông tin đăng nhập không chính xác']));
    }
    if (!password_verify($password, $getUser['password'])) {
        die(json_encode(['status' => 'error', 'message' => 'Thông tin đăng nhập không chính xác' ]));
    }

    $chu_de = 'Cảnh báo phát hiện đăng nhập tài khoản quản trị ';
    $noi_dung = '
Hệ thống phát hiện người dùng IP <b style="color:red;">'.myip().'</b> đang thực hiện đăng nhập tài khoản quản trị (<b>'.$getUser['username'].'</b>).<br>
<br>
<ul>
    <li>Thời gian: '.gettime().'</li>
    <li>IP: '.myip().'</li>
    <li>Thiết bị: '.$Mobile_Detect->getUserAgent().'</li>
</ul>';

    $DB->insert("logs", [
        'user_id'       => $getUser['id'],
        'ip'            => myip(),
        'device'        => $Mobile_Detect->getUserAgent(),
        'createdate'    => time(),
        'action'        => '[Warning] '.'Đăng nhập thành công vào hệ thống Admin'
    ]);
    $new_token = md5(random('QWERTYUIOPASDGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789', 6).time());
    $DB->update("users", [
        'ip'           => myip(),
        'time_session' => time(),
        'update_date'  => time(),
        'device'       => $Mobile_Detect->getUserAgent(),
    ], " `id` = '".$getUser['id']."' ");
    $_SESSION['admin_login'] = $getUser['token'];
    setcookie("admin_login", $getUser['token'], time() + 2952000, "/");
    die(json_encode(['status' => 'success','message' => 'Đăng nhập quản trị thành công!']));
}
