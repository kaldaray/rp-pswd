<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class UserNotes extends ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }

}
