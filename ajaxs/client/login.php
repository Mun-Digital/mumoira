<?php
require_once(__DIR__."/../../libs/db.php");
require_once(__DIR__."/../../libs/helpers.php");
$DB = new DB();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['phone'])) {
        die(json_encode(['status' => 'error', 'message' => 'Số điện thoại không được để trống']));
    }
    if (empty($_POST['password'])) {
        die(json_encode(['status' => 'error', 'message' => 'Mật khẩu không được để trống']));
    }
    $phone = check_string($_POST['phone']);
    $password = check_string($_POST['password']);
    $getUser = $DB->get_row("SELECT * FROM `users` WHERE `phone` = '$phone' ");
    if (!$getUser) {
        die(json_encode(['status' => 'error', 'message' => 'Số điện thoại không tồn tại']));
    }
    if (!password_verify($password, $getUser['password'])) {
        die(json_encode(['status' => 'error', 'message' => 'Mật khẩu không đúng']));
    }
    if ($getUser['banned'] == 1) {
        die(json_encode([
            'status' => 'error', 'message' => 'Tài khoản của bạn đã bị khoá truy cập']));
    }
    $DB->insert("logs", [
        'user_id'       => $getUser['id'],
        'ip'            => myip(),
        'device'        => $Mobile_Detect->getUserAgent(),
        'createdate'    => time(),
        'action'        => 'Đăng nhập thành công vào hệ thống'
    ]);
    $new_token = md5(random('0123456789qwertyuiopasdgjklzxcvbnm', 6).time());
    $DB->update("users", [
        'ip'            => myip(),
        'token'         => $new_token,
        'update_date'   => time(),
        'time_session'  => time(),
        'device'        => $Mobile_Detect->getUserAgent()
    ], " `id` = '".$getUser['id']."' ");

    setcookie("token", $new_token, time() + 2592000, "/");
    $_SESSION['token'] = $new_token;
    die(json_encode(['status' => 'success', 'message'    => 'Đăng nhập thành công']));
}
