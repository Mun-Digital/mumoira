<?php
require_once(__DIR__."/../../libs/db.php");
require_once(__DIR__."/../../libs/helpers.php");

$DB = new DB();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
# Step 1
  if ($_POST['type'] == 'send') {
    if (empty($_POST['username'])) {
        die(json_encode(['status' => 'error', 'message' => 'Username không được để trống']));
    }
    if (empty($_POST['phone'])) {
        die(json_encode(['status' => 'error', 'message' => 'Số điện thoại không được để trống']));
    }
    if (empty($_POST['password'])) {
        die(json_encode(['status' => 'error', 'message' => 'Mật khẩu không được để trống']));
    }
    if (empty($_POST['repassword'])) {
        die(json_encode(['status' => 'error', 'message' => 'Nhập lại mật khẩu không đúng']));
    }
    $username = check_string($_POST['username']);
    $phone = check_string($_POST['phone']);
    $password = check_string($_POST['password']);
    $repassword = check_string($_POST['repassword']);
    if ($password != $repassword) {
        die(json_encode(['status' => 'error', 'message' => 'Nhập lại mật khẩu không đúng']));
    }
    if (check_length_phone($phone) != true) {
        die(json_encode(['status' => 'error', 'message' => 'Độ dài số điện thoại không đúng']));
    }
    if (check_phone($phone) != true) {
        die(json_encode(['status' => 'error', 'message' => 'Định dạng số điện thoại không đúng']));
    }
    if ($DB->num_rows("SELECT * FROM `users` WHERE `username` = '$username' ") > 0) {
        die(json_encode(['status' => 'error','message' => 'Tên đăng nhập đã tồn tại trong hệ thống']));
    }
    if ($DB->num_rows("SELECT * FROM `users` WHERE `phone` = '$phone' ") > 0) {
        die(json_encode(['status' => 'error', 'message' => 'Số điện thoại đã tồn tại trong hệ thống']));
    }
    
    if ($DB->num_rows("SELECT * FROM `users` WHERE `ip` = '".myip()."' ") >= $DB->site('max_register_ip')) {
        die(json_encode(['status' => 'error', 'message' => 'IP của bạn đã đạt giới hạn tạo tài khoản cho phép']));
    }
    $otp = random("0123456789", 6);
    $isInsert = $DB->insert("otp_confirm", [
        'phone' => $phone,
        'otp'   => $otp,
        'time'  => time()
    ]);

    if ($isInsert) {
        die(json_encode(['status' => 'success', 'message' => 'Ok']));
    } else {
        die(json_encode(['status' => 'error', 'message' => 'Tạo tài khoản thất bại, vui lòng thử lại']));
    }

/**
    $token = md5(random('QWERTYUIOPASDGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789', 6).time());
    $isCreate = $DB->insert("users", [
        'token'         => $token,
        'username'      => $username,
        'phone'         => $phone,
        'password'      => TypePassword($password),
        'ip'            => myip(),
        'device'        => $Mobile_Detect->getUserAgent(),
        'create_date'   => time(),
        'update_date'   => time(),
        'time_session'  => time()
    ]);
    if ($isCreate) {
        $DB->insert("logs", [
            'user_id'       => $DB->get_row("SELECT * FROM `users` WHERE `token` = '$token' ")['id'],
            'ip'            => myip(),
            'device'        => $Mobile_Detect->getUserAgent(),
            'createdate'    => time(),
            'action'        => 'Thực hiện tạo tài khoản'
        ]);
        setcookie("token", $token, time() + 2592000, "/");
        $_SESSION['login'] = $token;

        die(json_encode(['status' => 'success', 'message' => 'Đăng ký thành công']));
    } else {
        die(json_encode(['status' => 'error', 'message' => 'Tạo tài khoản thất bại, vui lòng thử lại']));
    }
   **/ 
    } # End Step 1.
}


?>
