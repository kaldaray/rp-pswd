<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
            <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'layout' => 'horizontal',
                            'options' => ['class' => 'login100-form validate-form'],
                            'fieldConfig' => [
                                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                'labelOptions' => ['class' => 'col-lg-1 control-label'],
                            ],
                ]);  ?>

            <a href="/">
                <span class="login100-form-title p-b-28">
						<i class="fas fa-arrow-left"></i>
                </span>
            </a>

            <span class="login100-form-title p-b-45">
						Авторизация
					</span>

            <div class="wrap-input100 validate-input m-b-16" data-validate="Например: ex@abc.xyz">
                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'input100'])->label('Имя пользователя') ?>
            </div>

            <div class="wrap-input100 validate-input m-b-16" data-validate="Пароль обязателен">
                <?= $form->field($model, 'password')->passwordInput(['class' => 'input100'])->label('Пароль'); ?>
            </div>

            <div class="container-login100-form-btn p-t-25">
                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton('Войти', ['class' => 'login100-form-btn']) ?>
                    </div>
                </div>
            </div>

            <div class="text-center w-full p-t-90">
                <span class="txt1">
							Не зарегистрированы?
                </span>
            </div>

            <div class="text-center w-full p-t-10">
                <a class="txt1 bo1 hov1" href="/site/register">
                    Создайте учетную запись
                </a>
            </div>
            <?php ActiveForm::end();  ?>
        </div>
    </div>
</div>


