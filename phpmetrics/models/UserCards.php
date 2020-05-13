<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class UserCards extends ActiveRecord
{
    //public $idUser;
    public static function tableName()
    {
        return 'users_card';
    }
    public function rules()
    {
        return [
            [['nameOwner','numberCard','svc'], 'required'],
            [['nameOwner', 'nameCard'], 'string', 'max'=>25],
            [['numberCard'], 'string', 'max'=>255],
            [['svc'], 'string', 'max'=>255],
            [['typeCard'], 'safe'],
        ];
    }
    public function attributeLabels() {
        return [
            'nameCard' => 'Имя записи',
            'nameOwner' => 'Имя владельца',
            'numberCard' => 'Номер карты',
            'validity' => 'Срок годности',
            'typeCard' => 'Тип карты',
            'svc' => 'CVV код',
        ];
    }
}
