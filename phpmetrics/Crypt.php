<?php

namespace app\components;

use yii\base\Component;

class Crypt extends Component
{
    public function generatePrivate()
    {
        $config = array(
            "digest_alg" => "sha512",
            "private_key_bits" => 2048,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        );

        // Создаем пару ключей
        $res = openssl_pkey_new($config);
        // Получаем приватный
        openssl_pkey_export( $res, $privkey);

        return $privkey;
    }

    public function generatePublic()
    {

        $config = array(
            "digest_alg" => "sha512",
            "private_key_bits" => 2048,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        );

        $res = openssl_pkey_new($config);
        // Get private key
        openssl_pkey_export($res, $privkey);
        // Get public key
        $pubkey = openssl_pkey_get_details($res);
        $pubkey = $pubkey["key"];
        return $pubkey;
    }

    public function encrypt($data, $secret_key, $secret_iv)
    {
        if (!empty($data)) {
            $encrypt_method = "AES-256-CBC";

            $key = hash('sha512', $secret_key);

            $iv = substr(hash('sha512', $secret_iv), 0, 16);

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

        $key = hash('sha512', $secret_key);

        $iv = substr(hash('sha512', $secret_iv), 0, 16);

        $output = openssl_decrypt(base64_decode($data), $encrypt_method, $key, 0, $iv);
        if($output == false)
            return $data;
        else
            return $output;
    }
}