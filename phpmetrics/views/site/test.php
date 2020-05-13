<?php


use yii\base\Exception;
use yii\helpers\Html;

?>
<?
/*$str = 'Моя строка';
$key = openssl_pkey_new(array('private_key_bits' => 4096));
print $key;
echo '<br>';
$bob_key = openssl_pkey_get_details($key);
$bob_public_key = $bob_key['key'];

$alice_msg = "Hi Bob, im sending you a private message";
openssl_public_encrypt($alice_msg, $pvt_msg, $bob_public_key);
/**  BOB CODE **/
/*openssl_private_decrypt( $pvt_msg, $bob_received_msg, $key);
print $bob_received_msg;*/
/*echo '<br>';
try {
    $secret_key = Yii::$app->security->generateRandomString();
    $secret_iv = Yii::$app->security->generateRandomString();
} catch (Exception $e) {
    return;
}
    $model = Yii::$app->crypt->encrypt($str, $secret_key, $secret_iv);
    echo $model;*/

$key = openssl_pkey_new(array('private_key_bits' => 4096));
echo $key."<br>";
$key1 = Yii::$app->gener->generatePrivate();
echo $key1."<br>";
?>