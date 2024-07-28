<?php
require_once(__DIR__.'/../../libs/db.php');
require_once(__DIR__.'/../../libs/helpers.php');
require_once(__DIR__.'/../../libs/users.php');
$DB = new DB;
$user = new users;
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://apis.namanh.love/api/mbbank/history',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => [
            "access_token" => $DB->site('token_bank')
        ]]);
       $result = curl_exec($curl);
       curl_close($curl);

        $result = json_decode($result, true);
        if ($result['result']['responseCode'] == '00') {
        foreach ($result['transactionHistoryList'] as $data) {
            $tid            = check_string($data['refNo']);
            $description    = check_string($data['description']);
            $amount         = check_string($data['creditAmount']);
            $user_id        = parse_order_id($description, $DB->site('prefix_autobank'));
            if($getUser = $DB->get_row(" SELECT * FROM `users` WHERE `id` = '$user_id' ")){
                if ($DB->num_rows(" SELECT * FROM `invoices` WHERE `tid` = '$tid' AND `description` = '$description'  ") == 0){
                    $insert = $DB->insert("invoices", [
                        'tid'         => $tid,
                        'user_id'     => $getUser['id'],
                        'description' => $description,
                        'amount'      => $amount,
                        'time'        => time()
                    ]);
                    if ($insert) {
                            $isCong = $user->AddCredits($getUser['id'], $amount, "Nạp tiền tự động qua MBBank (#$tid - $description - $amount)");
                        }
                    } else {
                     die('Không có giao dịch nào.');
                    }
                }
             }
          }
