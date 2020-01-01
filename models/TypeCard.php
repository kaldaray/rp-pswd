<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class TypeCard extends ActiveRecord
{
    public static function tableName()
    {
        return 'type_card';
    }
}
