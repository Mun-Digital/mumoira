<?php

$DB = new DB();
if (isset($_COOKIE["token"])) {
    $getUser = $DB->get_row(" SELECT * FROM `users` WHERE `token` = '".check_string($_COOKIE['token'])."' ");
    if (!$getUser) {
        header("location: ".BASE_URL('client/logout'));
        exit();
    }
    $_SESSION['login'] = $getUser['token'];
}

if (!isset($_SESSION['token'])) {
    redirect(base_url('client/login'));
} else {
    $getUser = $DB->get_row(" SELECT * FROM `users` WHERE `token` = '".check_string($_SESSION['token'])."'  ");
    if (!$getUser) {
        redirect(base_url('client/login'));
    }
    if ($getUser['banned'] != 0) {
        redirect(base_url('common/banned'));
    }
    if ($getUser['money'] < 0) {
        $User = new users();
        $User->Banned($getUser['id'], 'Tài khoản âm tiền, nghi vấn bug');
        redirect(base_url('common/banned'));
    }
}