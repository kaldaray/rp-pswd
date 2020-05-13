<?php


namespace app\models;

use Yii;
use yii\base\Model;


class RegisterForm extends Model
{
    public $username;
    public $password;
    public $confirmPassword;
    public $email;

    public function rules() {
        return [
            [['username', 'password', 'confirmPassword', 'email'], 'required', 'message' => 'Это поле обязательно'],
            ['username', 'unique',  'targetClass' => User::className(),  'message' => 'Этот логин уже занят'],
            [['username'], 'string', 'max' => 30],
            [['username'], 'string', 'min' => 4],

            ['password', 'compare', 'compareAttribute' => 'confirmPassword', 'message' => 'Пароли не совпадают'],
            [['password'], 'string', 'min' => 4],
            [['password'], 'string', 'max' => 70],

            ['email', 'unique',  'targetClass' => User::className(),  'message' => 'Эта электронная почта занята'],
            [['email'], 'string', 'max' => 70],
            ['email', 'email', 'message' => 'Не соответствует типу Электронная почта'],
            ['secret_key', 'unique'],
        ];
    }

    public static function isSecretKeyExpire($key)
    {
        if (empty($key))
        {
            return false;
        }
        $expire = Yii::$app->params['secretKeyExpire'];
        $parts = explode('_', $key);
        $timestamp = (int) end($parts);

        return $timestamp + $expire >= time();
    }

    public static function findBySecretKey($key)
    {
        if (!static::isSecretKeyExpire($key))
        {
            return null;
        }
        return static::findOne([
            'secret_key' => $key,
        ]);
    }

    /* Хелперы */
    public function generateSecretKey()
    {
        $this->secret_key = Yii::$app->security->generateRandomString().'_'.time();
    }

    public function removeSecretKey()
    {
        $this->secret_key = null;
    }

    public function attributeLabels() {
        return [
            'username' => 'Логин',
            'email' => 'Электронная почта',
            'password' => 'Пароль',
            'confirmPassword' => 'Подтвердите пароль',
        ];
    }
}