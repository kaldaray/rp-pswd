<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class UserWifi extends ActiveRecord
{
    //public $idUser;
    public static function tableName()
    {
        return 'users_wifi';
    }
    public function rules()
    {
        return [
            [['nameWifi','passwordWifi'], 'required'],
            [['nameWifi', 'nameUser'], 'string', 'max'=>25],
            [['passwordWifi'], 'string', 'max'=>50],
            ['startPage', 'safe'],
            ['typeSecurity', 'safe'],
        ];
    }
    public function attributeLabels() {
        return [
            'nameWifi`' => 'Имя точки доступа',
            'passwordWifi' => 'Пароль',
            'nameUser' => 'Имя пользователя',
            'typeSecurity' => 'Тип защиты'
        ];
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

}
