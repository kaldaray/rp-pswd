<?php

namespace app\controllers;

use Yii;
use yii\base\Exception;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use app\models\RegisterForm;
use app\models\ContactForm;
use app\models\User;

class SiteController extends Controller
{
     /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                //'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
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
     *//**
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return Yii::$app->getResponse()->redirect(['/admin']);
        }
        return $this->render('index');
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

/*    public function actionTest()
    {
        $this->layout = 'empty';
        return $this->render('test');
    }
    public function beforeAction($action)
    {
        try {
            if (parent::beforeAction($action)) {
                if (in_array($action->id, ["admin", "bank"]) && (Yii::$app->user->isGuest || !(Yii::$app->user->identity->login==="root")))
                    throw new ForbiddenHttpException('Запрещен доступ');
                return true;
            }
        } catch (BadRequestHttpException $e) {
        }

    }*/
}
