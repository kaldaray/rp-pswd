<?php

namespace app\components;

use yii\base\Component;

class CryptVer2 extends Component
{
    public $HEADER_PREFIX = '\x96\x93\xf3\xcf';
    public $EXP_CNT = 10000;
    public $MSG_LEN = 32;
    public $ENCRYPT_METHOD = 'AES-256-CBC';

    public function encrypt($data, $secret_key, $secret_iv)
    {
        if (!empty($data)) {
            $message = $this->HEADER_PREFIX.$data;
            $message2 = $this->HEADER_PREFIX.(strlen($data))/2;

            $MSG_LEN = 32;
            while (strlen($message) % $this->$MSG_LEN != 0){
                 $message .= " ";
            }
            while (strlen($message2) % $this->$MSG_LEN != 0){
                $message2 .= " ";
            }
            $salt = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
            $key = '';
            $kandm = array(
                array($secret_key, $message, $key),
                array($secret_iv, $message2, $key),
            );
            for ($x=0; $x<2; $x++) {
                $key = hash_pbkdf2("sha512", $message, $salt, $this->EXP_CNT, $MSG_LEN);
                $kandm[$x][2]=$key;
                $kandm[$x][1]=openssl_encrypt($message, $this->ENCRYPT_METHOD, $key, 0,$this->getIV());
            }
            return $kandm;
        }
    }

    public function decrypt($data, $secret_key, $secret_iv)
    {
        if (empty($data)) {
            return;
        }
        $message = $this->HEADER_PREFIX.$data;
        $message2 = $this->HEADER_PREFIX.(strlen($data))/2;

        $MSG_LEN = 32;
        while (strlen($message) % $this->$MSG_LEN != 0){
            $message .= " ";
        }
        while (strlen($message2) % $this->$MSG_LEN != 0){
            $message2 .= " ";
        }
        $salt = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
        $key = hash_pbkdf2("sha512", $message, $salt, $this->EXP_CNT, $MSG_LEN);

        $output = openssl_decrypt(base64_decode($data), $this->ENCRYPT_METHOD, $key, 0, $this->getIV());
        if($output == false)
            return $data;
        else
            return $output;
    }
    protected function getIV() {
        return '1234567890123456';
    }

}