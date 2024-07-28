<?php
require_once(__DIR__."/../../libs/db.php");
require_once(__DIR__."/../../libs/helpers.php");
require_once(__DIR__.'/../../models/is_admin.php');

if (isset($_POST['id'])) {
    $id = check_string($_POST['id']);
    $row = $DB->get_row("SELECT * FROM `users` WHERE `id` = '$id' ");
    if (!$row) {
        die(json_encode(['status' => 'error', 'message' => 'ID user không tồn tại trong hệ thống']));
    }
    $isRemove = $DB->remove("users", " `id` = '$id' ");
    if ($isRemove) {
        $DB->insert("logs", [
            'user_id'       => $getUser['id'],
            'ip'            => myip(),
            'device'        => $Mobile_Detect->getUserAgent(),
            'createdate'    => time(),
            'action'        => 'Xoá người dùng ('.$row['username'].' ID '.$row['id'].')'
        ]);
        die(json_encode(['status' => 'success', 'message' => 'Xóa người dùng thành công']));
    }
} else {
    die(json_encode(['status' => 'error', 'message' => 'Dữ liệu không hợp lệ']));
}
