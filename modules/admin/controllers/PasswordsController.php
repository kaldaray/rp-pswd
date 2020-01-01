<?php

namespace app\modules\admin\controllers;

use app\models\User;
use app\models\UserNote;
use app\modules\admin\controllers\AppAdminController;
use app\models\UserPassword;
use Yii;
use yii\base\Exception;
use yii\db\StaleObjectException;

class PasswordsController extends AppAdminController
{
    public $secret_key;
    public $secret_iv;

    public function actionCreate()
    {
        $model = new UserPassword();

        try {
            $secret_key = Yii::$app->security->generateRandomString();
            $secret_iv = Yii::$app->security->generateRandomString();
        } catch (Exception $e) {
            return;
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->setAttribute('idUser', Yii::$app->user->id);
            $model->passwP = Yii::$app->crypt->encrypt($model->passwP, $secret_key, $secret_iv);
            $model->secret_key = $secret_key;
            $model->secret_iv = $secret_iv;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Запись добавлена');
                return $this->redirect(['passwords/index']);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDelete($idPass)
    {
        $model = UserPassword::findOne($idPass);
        try {
            $model->delete();
        } catch (StaleObjectException $e) {
        } catch (\Throwable $e) {
        }
        Yii::$app->session->setFlash('success', 'Запись удалена');
        return $this->redirect('index');
    }

    public function actionIndex()
    {
        $query = new \yii\db\Query;
        $query->select('*')
            ->from('users_password')
            ->where(' users_password.idUser = ' . Yii::$app->user->id);

        $noteList = $query->all();
        // alternatively, you can create DB command and execute it
        $command = $query->createCommand();
        // $command->sql returns the actual SQL
        try {
            $noteList = $command->queryAll();
        } catch (\yii\db\Exception $e) {
        }

        return $this->render('index', [
            'noteList' => $noteList,
        ]);
    }

    public function actionUpdate($idPass)
    {
        $model = UserPassword::findOne($idPass);
        $model->passwP = Yii::$app->crypt->decrypt($model->passwP, $model->secret_key, $model->secret_iv);
        if ($model->load(Yii::$app->request->post())) {
            $model->passwP = Yii::$app->crypt->encrypt($model->passwP, $model->secret_key, $model->secret_iv);
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Запись обновлена');
                return $this->redirect(['passwords/index']);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

}
