<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class UserPassword extends ActiveRecord
{
    public static function tableName()
    {
        return 'users_password';
    }

    public function rules()
    {
        return [
            [['namePass','usernamePass','passwP'], 'required'],
            [['namePass'], 'string', 'max'=>25],
            [['emailUser'], 'email'],
            [['usernamePass'], 'string', 'max'=>25],
            [['passwP'], 'string', 'max'=>255],
            [['web'], 'string', 'max'=>30],
        ];
    }
    public function attributeLabels() {
        return [
            'usernamePass`' => 'Логин',
            'passwP' => 'Пароль',
            'namePass' => 'Имя записи',
            'emailUser' => 'Электронная почта',
            'web' => 'Адрес ресурса',
        ];
    }

}
