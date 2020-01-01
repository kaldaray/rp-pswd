<?php

namespace app\modules\admin\controllers;

use Yii;

class DefaultController extends AppAdminController
{

    public function actionIndex()
    {
        $query = new \yii\db\Query;

        $temp = 0;

        $query1 = new \yii\db\Query;
        $query1->select('*')
            ->from('users_password')
            ->where('  users_password.idUser = ' . Yii::$app->user->id);

        $noteList = $query1->all();
        $temp += count($noteList);

        $query1 = new \yii\db\Query;
        $query1->select('*')
            ->from('users_card')
            ->where('  users_card.idUser = ' . Yii::$app->user->id);

        $noteList = $query1->all();
        $temp += count($noteList);

        $query1 = new \yii\db\Query;
        $query1->select('*')
            ->from('users_wifi')
            ->where('  users_wifi.idUser = ' . Yii::$app->user->id);

        $noteList = $query1->all();
        $temp += count($noteList);

        $query1 = new \yii\db\Query;
        $query1->select('*')
            ->from('users_notes')
            ->where('  users_notes.idUser = ' . Yii::$app->user->id);

        $noteList = $query1->all();
        $temp += count($noteList);


        return $this->render('index', [
            'noteList' => $temp,
        ]);
    }
    public function search($name){

    }
}
