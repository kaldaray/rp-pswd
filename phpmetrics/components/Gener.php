<?php

namespace app\components;

use yii\base\Component;

class Gener extends Component
{
    private function generatePrivate()
    {

        $config = array(
            "digest_alg" => "sha512",
            "private_key_bits" => 2048,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        );

        // Create the keypair
        $res = openssl_pkey_new($config);
        // Get private key
        openssl_pkey_export($res, $privkey);

        return $privkey;
    }

    private function generatePublic()
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
}