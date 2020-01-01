<?php


namespace app\controllers;

use app\models\RegisterForm;
use Yii;
use yii\web\Controller;

class RegisterController extends Controller
{
    public function actionIndex()
    {
        $this->layout = 'login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('/login/index', [
            'model' => $model,
        ]);
    }
}