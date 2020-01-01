<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class TypeSecurity extends ActiveRecord
{
    public static function tableName()
    {
        return 'typesecurity';
    }
}
