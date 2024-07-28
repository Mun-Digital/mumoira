<?php

require_once(__DIR__."/../libs/db.php");
require_once(__DIR__.'/../libs/helpers.php');
$DB = new DB();
$whitelist = ['127.0.0.1', '::1'];

$arrContextOptions = ["ssl" => ["verify_peer" => false, "verify_peer_name"=>false]];

if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
    die('Localhost không thể sử dụng chức năng này');
}
if ($DB->site('status_update') == 1) {
    if ($config['version'] != file_get_contents('https://server.namanh.love/version.php?version=1476652')) {
        define('filename', 'update_'.random('ABC123456789', 6).'.zip');
        define('serverfile', 'https://server.namanh.love/cloud/s3/1476652.zip');
        file_put_contents(filename, file_get_contents(serverfile));
        $file = filename;
        $path = pathinfo(realpath($file), PATHINFO_DIRNAME);
        $zip = new ZipArchive();
        $res = $zip->open($file);
        if ($res === true) {
            $zip->extractTo($path);
            $zip->close();
            unlink(filename);
            $query = file_get_contents(BASE_URL('update/install.php'), false, stream_context_create($arrContextOptions));
            if ($query) {
                unlink('update/install.php');
            }
            $file = @fopen('update.txt', 'a');
            if ($file) {
                $data = "[UPDATE SYSTEM] Phiên cập nhật phiên bản gần nhất vào lúc ".gettime().PHP_EOL;
                fwrite($file, $data);
                fclose($file);
            }
            die('Cập nhật thành công!');
        } else {
            die('Cập nhật thất bại!');
        }
    }
    die('Không có phiên bản mới nhất');
} else {
    die('Chức năng cập nhật tự động đang được tắt');
}
