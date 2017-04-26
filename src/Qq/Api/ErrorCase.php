<?php
namespace NxLib\Oauth2\Qq\Api;
/* PHP SDK
 * @version 2.0.0
 * @author connect@qq.com
 * @copyright © 2013, Tencent Corporation. All rights reserved.
 */

/*
 * @brief ErrorCase类，封闭异常
 * */
class ErrorCase{
    private $errorMsg;

    public function __construct(){
        $this->errorMsg = array(
            "20001" => "配置文件损坏或无法读取，请重新执行intall",
            "30001" => "The state does not match. You may be a victim of CSRF.",
            "50001" => "可能是服务器无法请求https协议,可能未开启curl支持,请尝试开启curl支持，重启web服务器，如果问题仍未解决，请联系我们"
            );
    }

    /**
     * showError
     * 显示错误信息
     * @param int $code 错误代码
     * @throws \Exception
     */
    public function showError($code){
        if(isset($this->errorMsg[$code])){
            throw new \Exception($this->errorMsg[$code]);
        }
        throw new \Exception("未知错误");
    }
    public function showTips($code, $description = '$'){
    }
}
