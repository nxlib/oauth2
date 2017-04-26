<?php
error_reporting(E_ALL);ini_set('display_errors', TRUE);ini_set('display_startup_errors', TRUE);
include dirname(__DIR__) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

$config = [];
$config['appid'] = "";
$config['appkey'] = "";
$config['callback'] = "https://www.xxx.com?aa=qqcallback";

$config['scope'] = "get_user_info";
$config['errorReport'] = true;
$config = json_decode(json_encode($config));

$qc  = new \NxLib\Oauth2\Qq\Api\QC($config);

$access_token =  $qc->qq_callback();
echo $access_token;
echo "<br>";
$open_id = $qc->get_openid();
echo $qc->get_openid();
$url = "https://graph.qq.com/user/get_user_info?openid={$open_id}&access_token={$access_token}&oauth_consumer_key=101396488";
$data = file_get_contents($url);
var_dump($data);