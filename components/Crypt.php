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
        // Возвращаем ключ
        return $privkey;
    }

    public function generatePublic()
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
        // Получаем публичный
        $pubkey = openssl_pkey_get_details($res);
        $pubkey = $pubkey["key"];
        return $pubkey;
    }

    /**
     * @encrypt(@param $data,@param $secret_key, @param $secret_iv)
     * @param $data Данные для шифрования.
     * @param $secret_key Первый ключ
     * @param $secret_iv Второй ключ
     * @encrypt_method Метод шифрования. Список доступных методов можно получить с помощью функции openssl_get_cipher_methods().
     * @key ключ
     * @iv ненулевой инициализирующий вектор
     * @options равен 0
     * */

    public function encrypt($data, $secret_key, $secret_iv)
    {
        if (!empty($data)) {
            // Выбираем метод шифрования
            $encrypt_method = "AES-256-CBC";
            // Генерируем хэш ключа
            $key = hash('sha512', $secret_key);
            // Генерируем ненулевой инициализирующий вектор.
            $iv = substr(hash('sha256', $secret_iv), 0, 16);
            // Зашифровываем данные выбранным методом
            $output = base64_encode(openssl_encrypt($data, $encrypt_method, $key, 0, $iv));
            // Возвращаем значения
            return $output;
        }
    }

    /**
     * @decrypt(@param $data,@param $secret_key, @param $secret_iv)
     * @encrypt_method Метод шифрования. Список доступных методов можно получить с помощью функции openssl_get_cipher_methods().
     * @key ключ
     * @iv ненулевой инициализирующий вектор
     * @options равен 0
     * @param $data Данные для шифрования.
     * @param $secret_key Первый ключ
     * @param $secret_iv Второй ключ
     * @return bool|false|string|void
     */
    public function decrypt($data, $secret_key, $secret_iv)
    {
        if (empty($data)) {
            return;
        }
        $output = false;
        // Выбираем метод шифрования
        $encrypt_method = "AES-256-CBC";
        // Генерируем хэш ключа
        $key = hash('sha512', $secret_key);
        // Генерируем ненулевой инициализирующий вектор.
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        // Расшифровываем данные выбранным методом
        $output = openssl_decrypt(base64_decode($data), $encrypt_method, $key, 0, $iv);
        if($output == false)
            return $data;
        else
            return $output;
    }
}