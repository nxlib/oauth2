<?php
namespace NxLib\Oauth2\Qq\Api;
/* PHP SDK
 * @version 2.0.0
 * @author connect@qq.com
 * @copyright © 2013, Tencent Corporation. All rights reserved.
 */

class Recorder{
    private static $data;
    private $inc;
    private $error;

    public function __construct($config){
        $this->error = new ErrorCase();

        $this->inc = $config;
        if(empty($this->inc)){
            $this->error->showError("20001");
        }

        if(empty($_SESSION['QC_userData'])){
            self::$data = array();
        }else{
            self::$data = $_SESSION['QC_userData'];
        }
    }

    public function write($name,$value){
        self::$data[$name] = $value;
    }

    public function read($name){
        if(empty(self::$data[$name])){
            return null;
        }else{
            return self::$data[$name];
        }
    }

    public function readInc($name){
        if(empty($this->inc->$name)){
            return null;
        }else{
            return $this->inc->$name;
        }
    }

    public function delete($name){
        unset(self::$data[$name]);
    }

    function __destruct(){
        $_SESSION['QC_userData'] = self::$data;
    }
    public function writeSession($name,$value){
        $_SESSION[$name] = $value;
    }

    public function readSession($name){
        if(isset($_SESSION[$name])){
            return $_SESSION[$name];
        }else{
            return null;
        }
    }
}
