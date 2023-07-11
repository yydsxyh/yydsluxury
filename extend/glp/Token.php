<?php
namespace glp;  

use think\Request;
class Token
{  
    //盐值
    protected $salt = 'dasfASD23g';

    public function __construct(){
        
    }
    
    /** 
     * 生成令牌 
     */ 
    public function generateToken(){

        $randStr = $this->randString(32);
        // $timeStamp = $_SERVER['REQUEST_TIME'];
        $timeStamp = time();

        $salt = $this->salt;

        return md5($randStr.$timeStamp.$salt);
    }
    
    /** 
     * 生成随机字符串
     * @param $len 长度
     */ 
    public function randString($len = 6){
        $chars='ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789';
        if ($len > 10) {//位数过长重复字符串一定次数
            $chars= $type==1? str_repeat($chars,$len) : str_repeat($chars,5);
        }

        $chars = str_shuffle($chars);
        $str = substr($chars, 0, $len);

        return $str;
    }
}  