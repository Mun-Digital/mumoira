<?php
require_once(__DIR__."/../../libs/db.php");
require_once(__DIR__."/../../libs/helpers.php");
require_once(__DIR__."/../../libs/users.php");
$DB = new DB();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = check_string($_POST['token']);
    $name = check_string($_POST['name']);
    $home = $_POST['home'];
    $position = check_string($_POST['position']);
    $exp = check_string($_POST['exp']);
    
    if (empty($token)) {
        die(json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập']));
    }
    if (!$getUser = $DB->get_row("SELECT * FROM `users` WHERE `token` = '".$token."' ")) {
        die(json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập']));
    }
    if ($getUser['money'] < 0) {
        die(json_encode(['status' => 'error', 'message' => 'Số dư không đủ']));
    }
    if (!$_FILES['banner']) {
        die(json_encode(['status' => 'error', 'message' => 'Thiếu banner']));
    }
    if ((!$home) || (!$name)) {
        die(json_encode(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ thông tin.']));
    }
    $banner = $DB->get_row("SELECT * FROM `banner_list` WHERE `position` = '".$position."'");
    if (!$banner) {
        die(json_encode(['status' => 'error', 'message' => 'Vị trí đặt không hợp lệ']));
    }
    if (!is_numeric($exp) or ($exp < 1)) {
        die(json_encode(['status' => 'error', 'message' => 'Thời gian không hợp lệ']));
    }
    $price = $exp * $banner['price'];
    if ($getUser['money'] - $price < 0) {
        die(json_encode(['status' =>'error', 'message' => 'Số dư của bạn không đủ để đặt vị trí này']));
    }
    $tmp_file = $_FILES['banner']['tmp_name'];
    $file_name = $_FILES['banner']['name'];
    $res = json_decode(upload_to_server($tmp_file, $file_name));
    if ($res->status == 'error') {
        die(json_encode(['status' => 'error', 'message' => 'Dữ liệu banner không hợp lệ']));
    }
    $insert = $DB->insert("banner",[
        'user_id' => $getUser['id'],
        'name' => $name,
        'home' => $home,
        'position' => $position,
        'data' => $res->file,
        'price' => $banner['price'],
        'status' => 'pending',
        'exp' => (time() + $exp * 2592000),
        'time' => time()
    ]);
    if ($insert) {
        $DB->insert("logs", [
            'user_id'       => $getUser['id'],
            'createdate'    => time(),
            'device'        => $Mobile_Detect->getUserAgent(),
            'ip'            => myip(),
            'action'        => 'Thuê đặt banner.'
        ]);
        /* Xử lý trừ tiền */
        $DBUser = new users();
        $DBUser->RemoveCredits($getUser['id'], $price, 'Thuê đặt banner');

        die(json_encode(['status' => 'success', 'message' => 'Thành công']));
    } else {
        die(json_encode(['status' => 'error', 'message' => 'Thất bại, vui lòng thử lại']));
    }
}