<?php

namespace app\modules\admin\controllers;

use app\models\UserWifi;
use Yii;
use yii\base\Exception;
use yii\db\StaleObjectException;

class UserWifiController extends AppAdminController
{
    public $secret_key;
    public $secret_iv;

    public function actionCreate()
    {
        $model = new UserWifi();

        try {
            $secret_key = Yii::$app->security->generateRandomString();
            $secret_iv = Yii::$app->security->generateRandomString();
        } catch (Exception $e) {
            return;
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->setAttribute('idUser', Yii::$app->user->id);
            $model->passwordWifi = Yii::$app->crypt->encrypt($model->passwordWifi, $secret_key, $secret_iv);
            $model->secret_key = $secret_key;
            $model->secret_iv = $secret_iv;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Запись добавлена');
                return $this->redirect(['user-wifi/index']);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDelete($idWifi)
    {
        $model = UserWifi::findOne($idWifi);
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
            ->from('users_wifi')
            ->innerJoin('typesecurity', ' users_wifi.typeSecurity = typesecurity.idTypeSecurity')
            ->where(' users_wifi.idUser = ' . Yii::$app->user->id);

        $noteList = $query->all();
        // alternatively, you can create DB command and execute it
        $command = $query->createCommand();
        // $command->sql returns the actual SQL
        try {
            $noteList = $command->queryAll();
        } catch (\yii\db\Exception $e) {

        }
        /**
         * Created by Yukal Alexander
         * Date: 29.01.17
         * Time: 11:35
         *
         *
         * User-Agent standards:
         *
         * RFC2616 (section 14.43, page 144)
         * http://www.ietf.org/rfc/rfc2616.txt
         *
         * RFC7231 (section 5.5.3, page 46)
         * https://tools.ietf.org/html/rfc7231#section-5.5.3
         *
         * User-Agent string template:
         * User-Agent: Mozilla/<version> (<system-information>) <platform> (<platform-details>) <extensions>
         *
         *
         * More about different User-Agent strings
         *
         * https://udger.com/resources/ua-list
         * https://developer.mozilla.org/ru/docs/Web/HTTP/Headers/User-Agent
         * https://deviceatlas.com/blog/user-agent-string-analysis
         * https://deviceatlas.com/blog/list-of-user-agent-strings
         * https://msdn.microsoft.com/en-us/library/ms537503(v=vs.85).aspx
         * https://developer.chrome.com/multidevice/user-agent
         * https://www.sitepoint.com/server-side-device-detection-with-browscap/
         *
         */
        /**
         * Created by Yukal Alexander
         * Date: 29.01.17
         * Time: 11:35
         *
         *
         * User-Agent standards:
         *
         * RFC2616 (section 14.43, page 144)
         * http://www.ietf.org/rfc/rfc2616.txt
         *
         * RFC7231 (section 5.5.3, page 46)
         * https://tools.ietf.org/html/rfc7231#section-5.5.3
         *
         * User-Agent string template:
         * User-Agent: Mozilla/<version> (<system-information>) <platform> (<platform-details>) <extensions>
         *
         *
         * More about different User-Agent strings
         *
         * https://udger.com/resources/ua-list
         * https://developer.mozilla.org/ru/docs/Web/HTTP/Headers/User-Agent
         * https://deviceatlas.com/blog/user-agent-string-analysis
         * https://deviceatlas.com/blog/list-of-user-agent-strings
         * https://msdn.microsoft.com/en-us/library/ms537503(v=vs.85).aspx
         * https://developer.chrome.com/multidevice/user-agent
         * https://www.sitepoint.com/server-side-device-detection-with-browscap/
         *
         */
        return $this->render('index', [
            'noteList' => $noteList,
        ]);
    }

    public function actionUpdate($idWifi)
    {
        $model = UserWifi::findOne($idWifi);
        $model->passwordWifi = Yii::$app->crypt->decrypt($model->passwordWifi, $model->secret_key, $model->secret_iv);
        if ($model->load(Yii::$app->request->post())) {
            $model->passwordWifi = Yii::$app->crypt->encrypt($model->passwordWifi, $model->secret_key, $model->secret_iv);
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Запись обновлена');
                return $this->redirect(['user-wifi/index']);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

}
