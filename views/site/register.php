<?php

use yii\bootstrap\Html;
use \yii\widgets\ActiveForm;

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