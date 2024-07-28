<?php
require_once(__DIR__."/../../libs/db.php");
require_once(__DIR__."/../../libs/helpers.php");
require_once(__DIR__.'/../../models/is_admin.php');

if (isset($_POST['id'])) {
    $id = check_string($_POST['id']);
    $row = $DB->get_row("SELECT * FROM `banner` WHERE `id` = '$id' ");
    if (!$row) {
        die(json_encode(['status' => 'error', 'message' => 'ID banner không tồn tại trong hệ thống']));
    }
    $active = $DB->update("banner", [
        'status' => 'active'
    ], "`id` = '".$id."'");
        
    if ($active) {
        $DB->insert("logs", [
            'user_id'       => $row['user_id'],
            'ip'            => myip(),
            'device'        => $Mobile_Detect->getUserAgent(),
            'createdate'    => time(),
            'action'        => 'Bạn được admin duyệt banner.'
        ]);
        die(json_encode(['status' => 'success', 'message' => 'Duyệt thành công']));
    }
} else {
    die(json_encode(['status' => 'error', 'message' => 'Dữ liệu không hợp lệ']));
}
