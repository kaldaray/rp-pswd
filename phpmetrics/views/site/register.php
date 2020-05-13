<?php

use yii\bootstrap\Html;
use \yii\widgets\ActiveForm;
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
$this->registerCssFile('../css/login.css');
$this->registerCssFile('../css/util.css');
$this->registerCssFile('../vendor/animate/animate.css');
$this->registerCssFile('../fonts/font-awesome-4.7.0/css/font-awesome.min.css');
$this->registerCssFile('../fonts/Linearicons-Free-v1.0.0/icon-font.min.css');
?>
<?php
$form = ActiveForm::begin(['class' => 'form-horizontal']);
?>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
                <div class="wrap-input100 validate-input m-b-16" data-validate="Например: root">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'input100'])?>
                </div>

                <div class="wrap-input100 validate-input m-b-16" data-validate="Например: ex@abc.xyz">
                    <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class' => 'input100']) ?>
                </div>

                <div class="wrap-input100 validate-input m-b-16" data-validate="Пароль обязателен">
                    <?= $form->field($model, 'password')->passwordInput(['class' => 'input100']); ?>
                </div>

                <div class="wrap-input100 validate-input m-b-16" data-validate="Пароль обязателен">
                    <?= $form->field($model, 'confirmPassword')->passwordInput(['class' => 'input100']); ?>
                </div>

                <div class="container-login100-form-btn p-t-25">
                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <?= Html::submitButton('Зарегистрироваться', ['class' => 'login100-form-btn']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
ActiveForm::end();
?>