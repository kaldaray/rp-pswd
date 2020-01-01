<?php

namespace app\components;

use yii\base\Component;

class Crypt extends Component
{
    public $salt;

    function encrypt_decrypt($action, $string)
    {

        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'WS-SERVICE-KEY';
        $secret_iv = 'WS-SERVICE-VALUE';

        $key = hash('sha256', $secret_key);

        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ($action == 'encrypt') {
            $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
        } else {
            if ($action == 'decrypt') {
                $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
            }
        }
        return $output;
    }

    public function encrypt($data, $secret_key, $secret_iv)
    {
        if (!empty($data)) {
            $output = false;
            $encrypt_method = "AES-256-CBC";
//            $secret_key = 'WS-SERVICE-KEY';
//            $secret_iv = 'WS-SERVICE-VALUE';

            $key = hash('sha256', $secret_key);

            $iv = substr(hash('sha256', $secret_iv), 0, 16);

            $output = base64_encode(openssl_encrypt($data, $encrypt_method, $key, 0, $iv));
            return $output;
        }
    }

    public function decrypt($data, $secret_key, $secret_iv)
    {
        if (empty($data)) {
            return;
        }
        $output = false;
        $encrypt_method = "AES-256-CBC";

        $key = hash('sha256', $secret_key);

        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        $output = openssl_decrypt(base64_decode($data), $encrypt_method, $key, 0, $iv);
        if($output == false)
            return $data;
        else
            return $output;
    }
}