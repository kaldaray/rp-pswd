<?php


namespace app\controllers;

use app\models\RegisterForm;
use app\models\User;
use Yii;
use yii\base\Exception;
use yii\web\Controller;

class RegisterController extends Controller
{

    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->layout = 'register';
        $model = new RegisterForm();
        if($model->load(\Yii::$app->request->post()) && $model->validate()){
            $user = new User();
            $user->username = $model->username;
            $user->email = $model->email;
            try {
                $user->password = \Yii::$app->security->generatePasswordHash($model->password);
            } catch (Exception $e) {
            }
            if($user->save()){
                return Yii::$app->getResponse()->redirect(['/login']);
            }
        }
        return $this->render('/register/index', [
            'model' => $model,
        ]);
    }

}