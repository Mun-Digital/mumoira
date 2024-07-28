<?php
require_once(__DIR__.'/../../libs/db.php');
require_once(__DIR__.'/../../libs/helpers.php');
$DB = new DB;
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://apis.namanh.love/api/mbbank/login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => [
            "username" => "NAMRICKID",
            "password" => "Anhcuai2001@da"
        ]]);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result, true);
        if (($result['status'] == "success") && ($result['responseCode'] == '00')) {
            $DB->update("settings", ['value' => $result['access_token']], "`name` = 'token_bank'");
        }
        $insert = $DB->insert("logs_autobank", [
            'status' => $result['responseCode'],
            'message' => $result['message'],
            'time'       => time()
        ]);