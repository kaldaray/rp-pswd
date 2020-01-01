<?php


namespace app\modules\admin\controllers;

use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\filters\AccessControl;

class AppAdminController extends Controller
{
    public $secret_key;
    public $secret_iv;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
}