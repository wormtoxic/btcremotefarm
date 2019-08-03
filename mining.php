<?php

include('config.php');
$w = "\033[1;37m";
$g = "\033[1;32m";
$r = "\033[1;31m";
$cy = "\033[1;36m";
$y = "\033[1;33m";
$b = "\033[1;34m";
$p = "\033[1;35m";
$d = "\033[1;30m";


function login($PHPSESSID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://cryptodiamonds.cryptoplanets.org/btcremotefarm/app16/index.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 8.1.0; ASUS_X00ID Build/OPM1.171019.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/72.0.3626.121 Mobile Safari/537.36";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
        $info_code = $info["http_code"];
        if ($info_code == 200){
                if (strpos($result,"All BTC Wallets are allowed!")){
                        echo "\n\033[1;31m Связи с сервером потеряно...\n";
                        sleep(2);
                       login($PHPSESSID);
                       start($PHPSESSID);
                }
                else{
                        $one = explode('<header class="wp-header" role="banner" style="list-style-type:none;">
    <h1><i class="fa fa-bitcoin"></i> 
                 <span id="user_balance">', $result);
                        $two = explode('</span></h1>', $one[1]);
                        global $pr;
                        $pr = "$two[0]\n";
                }
        }
        else{
                echo "\n\033[1;31m Связи с сервером потеряно...\n";
                sleep(2);
                start($PHPSESSID);
        }
}
function ball($PHPSESSID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://cryptodiamonds.cryptoplanets.org/btcremotefarm/app16/ajax.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 8.1.0; ASUS_X00ID Build/OPM1.171019.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/72.0.3626.121 Mobile Safari/537.36";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_reset($ch);
        $one = explode('<header class="wp-header" role="banner" style="list-style-type:none;">
    <h1><i class="fa fa-bitcoin"></i> 
                 <span id="user_balance">', $result);
                        $two = explode('</span></h1>', $one[1]);
                        global $pr;
                        $pr = "$two[0]\n";
                        login($PHPSESSID);
}
function start($PHPSESSID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://cryptodiamonds.cryptoplanets.org/btcremotefarm/app16/ajax.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 8.1.0; ASUS_X00ID Build/OPM1.171019.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/72.0.3626.121 Mobile Safari/537.36";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data['start_mining_info'] = '1';
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        global $result;
        $result = curl_exec($ch);
        curl_reset($ch);
        login($PHPSESSID);
}
function click($PHPSESSID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://cryptodiamonds.cryptoplanets.org/btcremotefarm/app16/ajax.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 8.1.0; ASUS_X00ID Build/OPM1.171019.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/72.0.3626.121 Mobile Safari/537.36";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data['claimbuttons_fb'] = '1';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_reset($ch);
}
function setInterval($PHPSESSID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://cryptodiamonds.cryptoplanets.org/btcremotefarm/app16/ajax.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 8.1.0; ASUS_X00ID Build/OPM1.171019.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/72.0.3626.121 Mobile Safari/537.36";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data['check_status'] = '0';
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        global $result;
        $result = curl_exec($ch);
        curl_reset($ch);
}
function stop($PHPSESSID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://cryptodiamonds.cryptoplanets.org/btcremotefarm/app16/ajax.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 8.1.0; ASUS_X00ID Build/OPM1.171019.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/72.0.3626.121 Mobile Safari/537.36";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data['stop_mining_info'] = '1';
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        global $result;
        $result = curl_exec($ch);
        curl_reset($ch);
}

date_default_timezone_set('Europe/Moscow');


$asciicode = " \033[1;30m                                                                 
==================================================
\033[1;32m__        __                 _____         _ V 5.0     
\033[1;32m\ \      / /__  _ __ _ __ __|_   _|____  _(_) ___ 
\033[1;32m \ \ /\ / / _ \| '__| '_ ` _ \| |/ _ \ \/ / |/ __|
\033[1;32m  \ V  V / (_) | |  | | | | | | | (_) >  <| | (__ 
\033[1;32m   \_/\_/ \___/|_|  |_| |_| |_|_|\___/_/\_\_|\___|
   
     BTC AUTO MINING SCRIPT FOR BTC REMOTE FARM   
\033[0;34m==================================================
\033[1;32m   Powered\033[1;31m    :\033[1;0m Worm Toxic LTS
\033[1;32m   https://github.com/wormtoxic/btcremotefarm
\033[1;32m   Copyright © 2019 «Все права сохранены»\033[1;31m
==================================================";

date_default_timezone_set('Europe/Moscow');
system('clear');
echo $asciicode;
echo $y."\nИдёт подключение  к серверу....";
login($PHPSESSID); 
echo $g."\nLogin Btc ..!\n".$g."Login Success"; 
echo "\nBallance Btc  : ".$w, $pr;
echo "\n".$y."Скрипт запущен пожалуйсто подождите...\n";
$i = 1;
while($i ==1) {
     { click($PHPSESSID);
       setInterval($PHPSESSID);
       start($PHPSESSID); echo "\n".$g."[".date("h:i:sa")."] Ваш баланс состовляет  : ".$w, $pr; 
       echo $p. ' На 1 минуту  вперёд : ' . date('Y-m-d H:i:s', time() + (60 * 60));  ball($PHPSESSID);   
       sleep(60);
      }
     
     
}

?>
