<?php
require_once(__DIR__."/../../libs/db.php");
require_once(__DIR__."/../../libs/helpers.php");
require_once(__DIR__."/../../libs/users.php");
$DB = new DB();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = check_string($_POST['token']);
    
    /** import data **/
      //$catalogy = check_string($_POST['catalogy']);
      $title = check_string($_POST['title']);
      $image = upload_imgur($_POST['image']);
      $home = check_string($_POST['home']);
      $fanpage_support = check_string($_POST['fanpage_support']);
      $version = check_string($_POST['version']);
      $reset = check_string($_POST['reset']);
      $type = check_string($_POST['type']);
      
      $point = check_string($_POST['point']);
      $server_name = check_string($_POST['server_name']);
      $description = check_string($_POST['description']);
      $alpha_test = check_string($_POST['alpha_test']);
      $open_beta = check_string($_POST['open_beta']);
      $exp = check_string($_POST['exp']);
      $drops = check_string($_POST['drops']);
      $anti_hack = check_string($_POST['anti_hack']);
      $motachitiet = check_string($_POST['motachitiet']);
      $time = time();
      
    
    if (empty($token)) {
        die(json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập']));
    }
    if (!$getUser = $DB->get_row("SELECT * FROM `users` WHERE `token` = '".$token."' ")) {
        die(json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập']));
    }
    
  /** handle file **/
    if (!$_FILES['image']) {
        die(json_encode(['status' => 'error', 'message' => 'Thiếu image']));
    }
    $tmp_file = $_FILES['banner']['tmp_name'];
    $file_name = $_FILES['banner']['name'];

/**    if (!$catalogy) {
        die(json_encode(['status' => 'error', 'message' => 'Thiếu thể loại']));
    }
**/
    if (!$title) {
        die(json_encode(['status' => 'error', 'message' => 'Thiếu tên MU']));
    }
    if (!$home) {
        die(json_encode(['status' => 'error', 'message' => 'Thiếu trang chủ']));
    }
    if (!$fanpage_support) {
        die(json_encode(['status' => 'error', 'message' => 'Thiếu Fanpage hỗ trợ']));
    }
    if (!$version) {
        die(json_encode(['status' => 'error', 'message' => 'Thiếu phiên bản']));
    }
    if (!$reset) {
        die(json_encode(['status' => 'error', 'message' => 'Thiếu kiểu reset']));
    }
    if (!$type) {
        die(json_encode(['status' => 'error', 'message' => 'Thiếu thể loại']));
    }
    if (!$point) {
        die(json_encode(['status' => 'error', 'message' => 'Thiếu kiểu point']));
    }
    if (!$server_name) {
        die(json_encode(['status' => 'error', 'message' => 'Thiếu tên máy chủ']));
    }
    if (!$description) {
        die(json_encode(['status' => 'error', 'message' => 'Thiếu miêu tả MU']));
    }
    if (!$alpha_test) {
        die(json_encode(['status' => 'error', 'message' => 'Thiếu Alpha test']));
    }
    if (!$open_beta) {
        die(json_encode(['status' => 'error', 'message' => 'Thiếu Open Beta']));
    }
    if (!$exp) {
        die(json_encode(['status' => 'error', 'message' => 'Thiếu EXP']));
    }
    if (!$drops) {
        die(json_encode(['status' => 'error', 'message' => 'Thiếu Drop']));
    }
    if (!$anti_hack) {
        die(json_encode(['status' => 'error', 'message' => 'Thiếu Anti Hack']));
    }
    if (!$motachitiet) {
        die(json_encode(['status' => 'error', 'message' => 'Thiếu mô tả chi tiết']));
    }
// upload image
    $upload = json_decode(upload_imgur($tmp_file, $file_name), true);
    if ($upload['status'] !== 'true') {
        die(json_encode(['status' => 'error', 'message' => 'Hình ảnh không hợp lệ']));
    }

    $insert = $DB->insert("banner",[
        "user_id" => $getUser['id'],
		"title" => $title,
		"image" => $upload['data']['link'],
		"home" => $home,
		"fanpage_support" => $fanpage_support,
		"version" => $version,
		"reset" => $reset,
		"type" => $type,
		"point" => $point,
		"server_name" => $server_name,
		"description" => $description,
		"alpha_test" => '',
		"open_beta" => '',
		"exp" => '',
		"drops" => $drops,
		"anti_hack" => $anti_hack,
		"motachitiet" => $motachitiet,
		"status" => 'pending',
		"time" => time()
    ]);
    if ($insert) {
        $DB->insert("logs", [
            'user_id'       => $getUser['id'],
            'createdate'    => time(),
            'device'        => $Mobile_Detect->getUserAgent(),
            'ip'            => myip(),
            'action'        => 'Đăng quảng cáo.'
        ]);

        die(json_encode(['status' => 'success', 'message' => 'Thành công']));
    } else {
        die(json_encode(['status' => 'error', 'message' => 'Thất bại, vui lòng thử lại']));
    }
}