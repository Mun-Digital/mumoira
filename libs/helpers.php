<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");

function upload_imgur($tmp_file, $file) {
    $curl = curl_init();
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime_type = finfo_file($finfo, $tmp_file);
finfo_close($finfo);
$cfile = new CURLFile($tmp_file, $mime_type, $file);

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.imgur.com/3/image',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('image'=> $cfile, 'type' => 'image', 'title' => 'MunLibrary', 'description' => 'This is a image has been upload by Mun'),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Client-ID 77d1f9a0316d214'
  ),
));

$response = curl_exec($curl);
curl_close($curl);
return $response;

}
function upload_to_server($tmp_file, $file) {
$curl = curl_init();
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime_type = finfo_file($finfo, $tmp_file);
finfo_close($finfo);
$cfile = new CURLFile($tmp_file, $mime_type, $file);
curl_setopt_array($curl, [
    CURLOPT_URL => 'https://clouds.namanh.love/upload.php',
    CURLOPT_POST => TRUE,
    CURLOPT_POSTFIELDS => ['file' => $cfile],
    CURLOPT_RETURNTRANSFER => TRUE,
]);
$response = curl_exec($curl);
curl_close($curl);
return $response;
}

function display_invoice($status)
{
    if ($status == 'waiting') {
        return '<span class="badge bg-warning">Waiting</span>';
    } elseif ($status == 'expired') {
        return '<span class="badge bg-danger">Expired</span>';
    } else if ($status == 'completed') {
        return '<span class="badge bg-success">Completed</span>';
    } else if ($status == 0) {
        return '<p class="mb-0 text-warning font-weight-bold d-flex justify-content-start align-items-center">Đang chờ thanh toán</p>';
    } else if ($status == 1) {
        return '<p class="mb-0 text-success font-weight-bold d-flex justify-content-start align-items-center">Đã thanh toán</p>';
    } else if ($status == 2) {
        return '<p class="mb-0 text-danger font-weight-bold d-flex justify-content-start align-items-center">Huỷ bỏ</p>';
    } else {
        return '<b style="color:yellow;">Khác</b>';
    }
}
function display_status_blogs($status)
{
    if ($status == 'pending') {
        return '<p class="mb-0 text-danger font-weight-bold d-flex justify-content-start align-items-center">Đang chờ</p>';
    } elseif ($status == 'active') {
        return '<p class="mb-0 text-success font-weight-bold d-flex justify-content-start align-items-center">Đã duyệt</p>';
    } else {
        return '<b style="color:yellow;">Không hợp lệ</b>';
    }
}
function base_url_admin($url = '')
{
    $a = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"];
    return $a.'?module=admin&action='.$url;
}

function active_sidebar_client($action)
{
    foreach ($action as $row) {
        $row2 = explode('/', $row);
        if(isset($row2[1])){
            if(isset($_GET['shop']) && $_GET['shop'] == $row2[1]){
                return 'active';
            }
        }
        if (isset($_GET['action']) && $_GET['action'] == $row) {
            return 'active';
        }
    }
    return '';
}
function show_sidebar_client($action)
{
    foreach ($action as $row) {
        if (isset($_GET['action']) && $_GET['action'] == $row) {
            return 'show';
        }
    }
    return '';
}
function pagination($url, $start, $total, $kmess)
{
    $out[] = ' <div class="paging_simple_numbers"><ul class="pagination">';
    $neighbors = 2;
    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));
    $base_link = '<li class="paginate_button page-item previous "><a class="page-link" href="' . strtr($url, array('%' => '%%')) . 'page=%d' . '">%s</a></li>';
    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, 'Previous');
    if ($start > $kmess * $neighbors) $out[] = sprintf($base_link, 1, '1');
    if ($start > $kmess * ($neighbors + 1)) $out[] = '<li class="paginate_button page-item previous disabled"><a class="page-link">...</a></li>';
    for ($nCont = $neighbors;$nCont >= 1;$nCont--) if ($start >= $kmess * $nCont) {
        $tmpStart = $start - $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    $out[] = '<li class="paginate_button page-item previous active"><a class="page-link">' . ($start / $kmess + 1) . '</a></li>';
    $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
    for ($nCont = 1;$nCont <= $neighbors;$nCont++) if ($start + $kmess * $nCont <= $tmpMaxPages) {
        $tmpStart = $start + $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) $out[] = '<li class="paginate_button page-item previous disabled"><a class="page-link">...</a></li>';
    if ($start + $kmess * $neighbors < $tmpMaxPages) $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
    if ($start + $kmess < $total)
    {
        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
        $out[] = sprintf($base_link, $display_page, 'Next');
    }
    $out[] = '</ul></div>';
    return implode('', $out);
}

function parse_order_id($des, $MEMO_PREFIX)
{
    $re = '/'.$MEMO_PREFIX.'\d+/im';
    preg_match_all($re, $des, $matches, PREG_SET_ORDER, 0);
    if (count($matches) == 0) {
        return null;
    }
    $orderCode = $matches[0][0];
    $prefixLength = strlen($MEMO_PREFIX);
    $orderId = intval(substr($orderCode, $prefixLength));
    return $orderId ;
}
function display_invoice_text($status)
{
    if ($status == 0) {
        return 'Đang chờ thanh toán';
    } elseif ($status == 1) {
        return 'Đã thanh toán';
    } elseif ($status == 2) {
        return 'Huỷ bỏ';
    } else {
        return 'Khác';
    }
}
function getRowRealtime($table, $id, $row)
{
    global $DB;
    return $DB->get_row("SELECT `".$row."` FROM `$table` WHERE `id` = '$id' ")[$row];
}

function get_url(){
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
        $url = "https://"; 
    }else {
        $url = "http://";
    }         
    $url.= $_SERVER['HTTP_HOST'];   
    $url.= $_SERVER['REQUEST_URI'];    
    return $url;  
}
// Hàm tạo URL
function base_url($url = '')
{
    global $domain_block;
    $a = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"];
    return $a.'/'.$url;
}
function TypePassword($password)
{
    return password_hash($password, PASSWORD_BCRYPT);
 }
function getUser($id, $row)
{
    $DB = new DB();
    return $DB->get_row("SELECT * FROM `users` WHERE `id` = '$id' ")[$row];
}
// check định dạng email
function check_email($data)
{
    if (preg_match('/^.+@.+$/', $data, $matches)) {
        return true;
    } else {
        return false;
    }
}
function check_length_phone($data)
{
    if ((strlen($data) < 10) or (strlen($data) > 11)) {
        return false;
    } else {
        return true;
    }
}
function check_phone($data)
{
    if (preg_match('/^\d+(\.\d+)?$/', $data, $matches)) {
        return true;
    } else {
        return false;
    }
}
// get datatime
function gettime()
{
    return date('Y/m/d H:i:s', time());
}
function myip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }
    if(isset(explode(',', $ip_address)[1])){
        return explode(',', $ip_address)[0];
    }
    return check_string($ip_address);
}
// lọc input
function check_string($data)
{
    return trim(htmlspecialchars(addslashes($data)));
    return str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($data))));
}
function format_cash($number, $suffix = '')
{
    return number_format($number, 0, ',', '.') . "{$suffix}";
}
function create_slug($string)
{
    $search = array(
        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
        '#(ì|í|ị|ỉ|ĩ)#',
        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
        '#(ỳ|ý|ỵ|ỷ|ỹ)#',
        '#(đ)#',
        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
        '#(Ì|Í|Ị|Ỉ|Ĩ)#',
        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
        '#(Đ)#',
        "/[^a-zA-Z0-9\-\_]/",
    );
    $replace = array(
        'a',
        'e',
        'i',
        'o',
        'u',
        'y',
        'd',
        'A',
        'E',
        'I',
        'O',
        'U',
        'Y',
        'D',
        '-',
    );
    $string = preg_replace($search, $replace, $string);
    $string = preg_replace('/(-)+/', '-', $string);
    $string = strtolower($string);
    return $string;
}
function curl_get($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
function curl_dataPost($url, $dataPost){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $dataPost,
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}
function curl_post($url, $method, $postinfo, $cookie_file_path)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie_file_path);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file_path);
    curl_setopt(
        $ch,
        CURLOPT_USERAGENT,
        "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7"
    );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    if ($method=='POST') {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
    }
    $html = curl_exec($ch);
    curl_close($ch);
    return $html;
}
function random($string, $int)
{
    return substr(str_shuffle($string), 0, $int);
}
// Hàm redirect
function redirect($url)
{
    header("Location: {$url}");
    exit();
}
function active_sidebar($action)
{
    foreach ($action as $row) {
        if (isset($_GET['action']) && $_GET['action'] == $row) {
            return 'active';
        }
    }
    return '';
}
function menuopen_sidebar($action)
{
    foreach ($action as $row) {
        if (isset($_GET['action']) && $_GET['action'] == $row) {
            return 'menu-open';
        }
    }
    return '';
}

function input_post($key)
{
    return isset($_POST[$key]) ? trim($_POST[$key]) : false;
}
function input_get($key)
{
    return isset($_GET[$key]) ? trim($_GET[$key]) : false;
}
function is_submit($key)
{
    return (isset($_POST['request_name']) && $_POST['request_name'] == $key);
}

function display_mark($data)
{
    if ($data == 1) {
        $show = '<span class="badge badge-success">Có</span>';
    } elseif ($data == 0) {
        $show = '<span class="badge badge-danger">Không</span>';
    }
    return $show;
}
// display banned
function display_banned($banned)
{
    if ($banned != 1) {
        return '<span class="badge badge-success">Active</span>';
    } else {
        return '<span class="badge badge-danger">Banned</span>';
    }
}
// display online
function display_online($time)
{
    if (time() - $time <= 300) {
        return '<span class="badge badge-success">Online</span>';
    } else {
        return '<span class="badge badge-danger">Offline</span>';
    }
}
function display_role($data)
{
    if ($data == 1) {
        $show = '<span class="badge badge-danger">Admin</span>';
    } elseif ($data == 0) {
        $show = '<span class="badge badge-info">Member</span>';
    }
    return $show;
}
// Hàm show msg
function msg_success($text, $url, $time)
{
    return die('<script type="text/javascript">swal("Thành Công", "'.$text.'","success");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function msg_error($text, $url, $time)
{
    return die('<script type="text/javascript">swal("Thất Bại", "'.$text.'","error");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function msg_warning($text, $url, $time)
{
    return die('<script type="text/javascript">swal("Thông Báo", "'.$text.'","warning");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function check_img($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("png","jpeg","jpg","PNG","JPEG","JPG","gif","GIF");
    if (in_array($ext, $valid_ext)) {
        return true;
    }
}
function timeAgo($time_ago)
{
    $time_ago = empty($time_ago) ? 0 : $time_ago;
    if ($time_ago == 0) {
        return '--';
    }
    $time_ago   = date("Y-m-d H:i:s", $time_ago);
    $time_ago   = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60);
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400);
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640);
    $years      = round($time_elapsed / 31207680);
    // Seconds
    if ($seconds <= 60) {
        return "$seconds ".__('giây trước');
    }
    //Minutes
    elseif ($minutes <= 60) {
        return "$minutes ".__('phút trước');
    }
    //Hours
    elseif ($hours <= 24) {
        return "$hours ".__('tiếng trước');
    }
    //Days
    elseif ($days <= 7) {
        if ($days == 1) {
            return __('Hôm qua');
        } else {
            return "$days ".__('ngày trước');
        }
    }
    //Weeks
    elseif ($weeks <= 4.3) {
        return "$weeks ".__('tuần trước');
    }
    //Months
    elseif ($months <=12) {
        return "$months ".__('tháng trước');
    }
    //Years
    else {
        return "$years ".__('năm trước');
    }
}

function timeAgo2($time_ago)
{
    $time_ago   = date("Y-m-d H:i:s", $time_ago);
    $time_ago   = strtotime($time_ago);
    $time_elapsed   = $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60);
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400);
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640);
    $years      = round($time_elapsed / 31207680);
    // Seconds
    if ($seconds <= 60) {
        return "$seconds giây";
    }
    //Minutes
    elseif ($minutes <= 60) {
        return "$minutes phút";
    }
    //Hours
    elseif ($hours <= 24) {
        return "$hours tiếng";
    }
    //Days
    elseif ($days <= 7) {
        if ($days == 1) {
            return "$days ngày";
        } else {
            return "$days ngày";
        }
    }
    //Weeks
    elseif ($weeks <= 4.3) {
        return "$weeks tuần";
    }
    //Months
    elseif ($months <=12) {
        return "$months tháng";
    }
    //Years
    else {
        return "$years năm";
    }
}
function dirToArray($dir)
{
    $result = array();

    $cdir = scandir($dir);
    foreach ($cdir as $key => $value) {
        if (!in_array($value, array(".",".."))) {
            if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
                $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
            } else {
                $result[] = $value;
            }
        }
    }

    return $result;
}

 function realFileSize($path)
 {
     if (!file_exists($path)) {
         return false;
     }

     $size = filesize($path);

     if (!($file = fopen($path, 'rb'))) {
         return false;
     }

     if ($size >= 0) {//Check if it really is a small file (< 2 GB)
        if (fseek($file, 0, SEEK_END) === 0) {//It really is a small file
            fclose($file);
            return $size;
        }
     }

     //Quickly jump the first 2 GB with fseek. After that fseek is not working on 32 bit php (it uses int internally)
     $size = PHP_INT_MAX - 1;
     if (fseek($file, PHP_INT_MAX - 1) !== 0) {
         fclose($file);
         return false;
     }

     $length = 1024 * 1024;
     while (!feof($file)) {//Read the file until end
         $read = fread($file, $length);
         $size = bcadd($size, $length);
     }
     $size = bcsub($size, $length);
     $size = bcadd($size, strlen($read));

     fclose($file);
     return $size;
 }
function FileSizeConvert($bytes)
{
    $bytes = floatval($bytes);
    $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach ($arBytes as $arItem) {
        if ($bytes >= $arItem["VALUE"]) {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", ",", strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}
function GetCorrectMTime($filePath)
{
    $time = filemtime($filePath);

    $isDST = (date('I', $time) == 1);
    $systemDST = (date('I') == 1);

    $adjustment = 0;

    if ($isDST == false && $systemDST == true) {
        $adjustment = 3600;
    } elseif ($isDST == true && $systemDST == false) {
        $adjustment = -3600;
    } else {
        $adjustment = 0;
    }

    return ($time + $adjustment);
}
function getFileType(string $url): string
{
    $filename=explode('.', $url);
    $extension=end($filename);

    switch ($extension) {
        case 'pdf':
            $type=$extension;
            break;
        case 'docx':
        case 'doc':
            $type='word';
            break;
        case 'xls':
        case 'xlsx':
            $type='excel';
            break;
        case 'mp3':
        case 'ogg':
        case 'wav':
            $type='audio';
            break;
        case 'mp4':
        case 'mov':
            $type='video';
            break;
        case 'zip':
        case '7z':
        case 'rar':
            $type='archive';
            break;
        case 'jpg':
        case 'jpeg':
        case 'png':
            $type='image';
            break;
        default:
            $type='alt';
    }

    return $type;
}

function getLocation($ip)
{
    if($ip = '::1'){
        $data = [
            'country' => 'VN'
        ];
        return $data;
    }
    $url = "http://ipinfo.io/" . $ip;
    $location = json_decode(file_get_contents($url), true);
    return $location;
}