<?php
namespace Aes;
/**
 * AES256加解密类
 * v1.2
 */
class Aes{
    //公钥
    public static $secrect_key = '1277e0910d753295b448797678e090ad';

    /**
     * 加密方法
     * @param string $str
     * @param string $iv 私钥
     * @return string
     */
    public static function encrypt($str,$iv){
        $s = self::$secrect_key;
        $s = base64_decode($s);
        $str = trim($str);

        $encrypt_str =  mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $s, $str, MCRYPT_MODE_CBC, $iv);
        return base64_encode($encrypt_str);
    }
      
    /**
     * 解密方法
     * @param string $str
     * @param string $iv 私钥
     * @return string
     */
    public static function decrypt($str,$iv){
        $s = self::$secrect_key;
        $str = base64_decode($str);
        $s = base64_decode($s);
        $encrypt_str =  mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $s, $str, MCRYPT_MODE_CBC, $iv);
        $encrypt_str = trim($encrypt_str);
        return $encrypt_str;
      
    }
 
}