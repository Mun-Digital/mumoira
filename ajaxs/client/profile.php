<?php
require_once(__DIR__."/../../libs/db.php");
require_once(__DIR__."/../../libs/helpers.php");
$DB = new DB();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'ChangeProfile') {
        if (empty($_POST['token'])) {
            die(json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập']));
        }
        if (!$getUser = $DB->get_row("SELECT * FROM `users` WHERE `token` = '".check_string($_POST['token'])."' ")) {
            die(json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập']));
        }
        $isUpdate = $DB->update("users", [
            'phone' => isset($_POST['phone']) ? check_string($_POST['phone']) : null
        ], " `token` = '".check_string($_POST['token'])."' ");
        if ($isUpdate) {
            $DB->insert("logs", [
                'user_id'       => $getUser['id'],
                'ip'            => myip(),
                'device'        => $Mobile_Detect->getUserAgent(),
                'createdate'    => time(),
                'action'        => 'Thay đổi thông tin hồ sơ'
            ]);
            die(json_encode(['status' => 'success', 'message' => 'Lưu thành công']));
        }
        die(json_encode(['status' => 'error', 'message' => 'Lưu thất bại']));
    }

    if (isset($_POST['action']) && $_POST['action'] == 'ChangePassword') {
        if (empty($_POST['token'])) {
            die(json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập']));
        }
        if (!$getUser = $DB->get_row("SELECT * FROM `users` WHERE `token` = '".check_string($_POST['token'])."' ")) {
            die(json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập']));
        }
        if (empty($_POST['password'])) {
            die(json_encode(['status' => 'error', 'message' => 'Vui lòng nhập mật khẩu hiện tại']));
        }
        if (empty($_POST['newpassword'])) {
            die(json_encode(['status' => 'error', 'message' => 'Vui lòng nhập mật khẩu mới']));
        }
        if (empty($_POST['renewpassword'])) {
            die(json_encode(['status' => 'error', 'message' => 'Nhập lại mật khẩu không đúng']));
        }
        if ($_POST['renewpassword'] != $_POST['newpassword']) {
            die(json_encode(['status' => 'error', 'message' => 'Nhập lại mật khẩu không đúng']));
        }
        $password = check_string($_POST['password']);
        if (!password_verify($password, $getUser['password'])) {
            die(json_encode(['status' => 'error', 'message' => 'Mật khẩu hiện tại không chính xác']));
        }
        $isUpdate = $DB->update("users", [
            'password'  => isset($_POST['newpassword']) ? TypePassword(check_string($_POST['newpassword'])) : null,
            'token'     => md5(random('QWERTYUIOPASDGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789', 6).time())
        ], " `token` = '".check_string($_POST['token'])."' ");
        if ($isUpdate) {
            $DB->insert("logs", [
                'user_id'       => $getUser['id'],
                'ip'            => myip(),
                'device'        => $Mobile_Detect->getUserAgent(),
                'createdate'    => time(),
                'action'        => 'Thay đổi mật khẩu'
            ]);
            die(json_encode(['status' => 'success', 'message' => 'Đổi mật khẩu thành công']));
        }
        die(json_encode(['status' => 'error', 'message' => 'Đổi mật khẩu thất bại']));
    }
}
