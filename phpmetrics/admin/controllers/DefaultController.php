<?php

namespace app\modules\admin\controllers;

use app\models\UserCards;
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
        // Вывод последних записей по категориям
        /*$query2 = new \yii\db\Query;
        $query2->select('users_card.nameCard,
                                  users_card.idCardUser,
                                  users_notes.nameNote,
                                  users_notes.idNotes,
                                  users_password.namePass,
                                  users_password.idPass,
                                  users_wifi.nameWifi,
                                  users_wifi.idWifi')
            ->from('users_card')
            ->innerJoin('user', 'users_card.idUser = user.id')
            ->innerJoin('users_notes', 'users_notes.idUser = user.id')
            ->innerJoin('users_password', 'users_password.idUser = user.id')
            ->innerJoin('users_wifi', 'users_wifi.idUser = user.id')
            ->where('user.id = ' . Yii::$app->user->id)
            ->orderBy(['users_password.lastModified' => SORT_DESC, 'users_notes.lastModified' => SORT_DESC,
                'users_card.lastModified' => SORT_DESC, 'users_wifi.lastModified' => SORT_DESC,])
            ->limit(4);

        $wifiList = $query2->all();
        // alternatively, you can create DB command and execute it
        $command12 = $query2->createCommand();
        // $command->sql returns the actual SQL
        try {
            $wifiList = $command12->queryAll();
        } catch (\yii\db\Exception $e) {

        }*/
        $countQuery = array(0, 0, 0, 0);
        $queryCard = new \yii\db\Query;
        $queryCard
            ->select(' users_card.idCardUser, users_card.nameCard')
            ->from('users_card')
            ->where('users_card.idUser = ' . Yii::$app->user->id)
            ->andWhere('nameCard IS NOT NULL')
            ->orderBy(['users_card.lastModified' => SORT_DESC])
            ->limit(1);
        $searchList = $queryCard->all();

        $countQuery[0] = count($searchList);

        $queryPass = new \yii\db\Query;
        $queryPass
            ->select('users_password.idPass, users_password.namePass')
            ->from('users_password')
            ->where('users_password.idUser = ' . Yii::$app->user->id)
            ->andWhere('namePass IS NOT NULL')
            ->orderBy(['users_password.lastModified' => SORT_DESC])
            ->limit(1);

        $searchList2 = $queryPass->all();
        $countQuery[1] = count($searchList2);
        $queryWifi = new \yii\db\Query;
        $queryWifi
            ->select('users_wifi.idWifi, users_wifi.nameWifi')
            ->from('users_wifi')
            ->where('users_wifi.idUser = ' . Yii::$app->user->id)
            ->andWhere('nameWifi IS NOT NULL')
            ->orderBy(['users_wifi.lastModified' => SORT_DESC])
            ->limit(1);

        $searchList3 = $queryWifi->all();
        $countQuery[2] = count($searchList3);
        $queryNote = new \yii\db\Query;
        $queryNote
            ->select(' users_notes.idNotes, users_notes.nameNote')
            ->from('users_notes')
            ->where('users_notes.idUser = ' . Yii::$app->user->id)
            ->andWhere('nameNote IS NOT NULL')
            ->orderBy(['users_notes.lastModified' => SORT_DESC])
            ->limit(1);
        $searchList4 = $queryNote->all();
        $countQuery[3] = count($searchList4);
        $queryCard->union($queryPass);
        $queryCard->union($queryWifi);
        $queryCard->union($queryNote);

       $wifiList = $queryCard->all();
        // alternatively, you can create DB command and execute it
        $command = $queryCard->createCommand();
        // $command->sql returns the actual SQL
        try {
            $wifiList = $command->queryAll();

        } catch (\yii\db\Exception $e) {

        }

        return $this->render('index', [
            'noteList' => $temp,
            'wifiList' => $wifiList,
            'countQuery' => $countQuery,
        ]);
    }

    public function actionSearch($value=null)
    {
        $countQuery = array(0, 0, 0, 0);
        $query1 = new \yii\db\Query;
        $query1
            ->select(' users_card.idCardUser, users_card.nameCard')
            ->from('users_card')
            //->where(['like', 'users_card.nameCard', $value . '%', false])
            ->filterWhere(['LIKE', 'users_card.nameCard', $value])
            ->andWhere('users_card.idUser ='.Yii::$app->user->id)
            ->andWhere('nameCard IS NOT NULL')->all();
        $searchList = $query1->all();

        $countQuery[0] = count($searchList);

        $query2 = new \yii\db\Query;
        $query2
            ->select('users_password.idPass, users_password.namePass')
            ->from('users_password')
            ->filterWhere(['LIKE', 'users_password.namePass', $value])
            //->where(['like', 'users_password.namePass', $value . '%', false])
            ->andWhere('users_password.idUser ='.Yii::$app->user->id)
            ->andWhere('namePass IS NOT NULL')->all();
        $searchList2 = $query2->all();
        $countQuery[1] = count($searchList2);
        $query3 = new \yii\db\Query;
        $query3
            ->select('users_wifi.idWifi, users_wifi.nameWifi')
            ->from('users_wifi')
            ->filterWhere(['like', 'nameWifi', $value])
            //->where(['like', 'users_wifi.nameWifi', $value . '%', false])
            ->andWhere('users_wifi.idUser ='.Yii::$app->user->id)
            ->andWhere('nameWifi IS NOT NULL');
        $searchList3 = $query3->all();
        $countQuery[2] = count($searchList3);
        $query4 = new \yii\db\Query;
        $query4
            ->select(' users_notes.idNotes, users_notes.nameNote')
            ->from('users_notes')
            ->where(['like', 'users_notes.nameNote', $value . '%', false])
            ->andWhere('users_notes.idUser ='.Yii::$app->user->id)
            ->andWhere('nameNote IS NOT NULL');
        $searchList4 = $query4->all();
        $countQuery[3] = count($searchList4);
        $query1->union($query2);
        $query1->union($query3);
        $query1->union($query4);

       $searchList1 = $query1->all();
        // alternatively, you can create DB command and execute it
        $command = $query1->createCommand();
        // $command->sql returns the actual SQL
        try {
            $searchList1 = $command->queryAll();

        } catch (\yii\db\Exception $e) {

        }

        return $this->render('search', [
            'searchList' => $searchList1,
            'countQuery' => $countQuery,
        ]);
    }
}
