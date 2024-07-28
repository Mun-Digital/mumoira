<?php

require_once(__DIR__.'/libs/db.php');
require_once(__DIR__.'/libs/helpers.php');
require_once(__DIR__.'/libs/users.php');

$DB = new DB();

$module = !empty($_GET['module']) ? check_string($_GET['module']) : 'client';
$action = !empty($_GET['action']) ? check_string($_GET['action']) : 'home';

if($action == 'footer' || $action == 'header' || $action == 'sidebar' || $action == 'nav'):
    require_once(__DIR__.'/resources/views/common/404.php');
    exit();
endif;
$path = "resources/views/$module/$action.php";
if (file_exists($path)) {
    require_once(__DIR__.'/'.$path);
    exit();
} else {
    require_once(__DIR__.'/resources/views/common/404.php');
    exit();
}
?>
