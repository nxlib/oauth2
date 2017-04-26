<?php
error_reporting(E_ALL);ini_set('display_errors', TRUE);ini_set('display_startup_errors', TRUE);
include dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

$config = [];
$config['appid'] = "";
$config['appkey'] = "";
$config['callback'] = "https://www.xxx.com?aa=qqcallback";

$config['scope'] = "get_user_info";
$config['errorReport'] = true;
$config = json_decode(json_encode($config));

$qc  = new \NxLib\Oauth2\Qq\Api\QC($config);
$qc->qq_login();