<?php

$DB = new DB();

if (!isset($_SESSION['admin_login'])) {
    redirect(base_url('admin/login'));
} else {
    $getUser = $DB->get_row(" SELECT * FROM `users` WHERE `admin` = 1 AND `token` = '".$_SESSION['admin_login']."'  ");
    if (!$getUser) {
        redirect(base_url('admin/login'));
    }
    if ($getUser['banned'] != 0) {
        redirect(base_url('common/banned'));
    }
/*    if($DB->site('status_security') == 1){
        if(!$DB->get_row("SELECT * FROM `ip_white` WHERE `ip` = '".myip()."' ")){
            redirect(base_url('common/block'));
        }
    }
*/    
    $DB->update("users", [
        'time_session'  => time()
    ], " `id` = '".$getUser['id']."' ");
}
