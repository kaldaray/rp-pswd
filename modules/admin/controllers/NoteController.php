<?php

namespace app\modules\admin\controllers;

use app\models\UserNote;
use Yii;
use yii\base\Exception;

class NoteController extends AppAdminController
{
    public $secret_key;
    public $secret_iv;

    public function actionCreate()
    {
        $model = new UserNote();
        $model->setAttribute('idUser', Yii::$app->user->id);

        try {
            $secret_key = Yii::$app->security->generateRandomString();
            $secret_iv = Yii::$app->security->generateRandomString();
        } catch (Exception $e) {
            return;
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->note = Yii::$app->crypt->encrypt($model->note, $secret_key, $secret_iv);
            $model->secret_key = $secret_key;
            $model->secret_iv = $secret_iv;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Запись добавлена');
                return $this->redirect(['note/index']);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDelete($idNotes)
    {
        $model = UserNote::findOne($idNotes);
        $model->delete();
        Yii::$app->session->setFlash('success', 'Запись удалена');
        return $this->redirect('index');
    }

    public function actionIndex()
    {
        //$noteList = UserNote::find()->all();

        $query = new \yii\db\Query;
        $query->select('*')
            ->from('users_notes')
            ->where(' users_notes.idUser = ' . Yii::$app->user->id);

        $noteList = $query->all();
        // alternatively, you can create DB command and execute it
        $command = $query->createCommand();
        // $command->sql returns the actual SQL
        $noteList = $command->queryAll();

        return $this->render('index', [
            'noteList' => $noteList,
        ]);
    }

    public function actionUpdate($idNotes)
    {
        $model = UserNote::findOne($idNotes);
        $model->note = Yii::$app->crypt->decrypt($model->note, $model->secret_key, $model->secret_iv);
        if ($model->load(Yii::$app->request->post())) {
            $model->note = Yii::$app->crypt->encrypt($model->note, $model->secret_key, $model->secret_iv);
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Запись обновлена');
                return $this->redirect(['note/index']);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

}
