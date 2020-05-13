<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class UserNote extends ActiveRecord
{
    public static function tableName()
    {
        return 'users_notes';
    }

    public function rules()
    {
        return [
            [['nameNote','note'], 'required'],
            [['nameNote'], 'string', 'max'=>25],
            [['note'], 'string',],
        ];
    }
    public function attributeLabels() {
        return [
            'nameNote' => 'Имя записи',
            'note' => 'Текст записи',
        ];
    }
}
