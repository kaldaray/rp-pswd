<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
$this->title='Редактирование записи с учетной записью';
?>
<h2><a href="/admin/passwords" class="black-arrow"><i class="fas fa-arrow-left"></i></a></h2>

<h1>Редактирование записи с паролем</h1>

<div class="container">
    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo $form->field($model, 'namePass')->begin();
    echo Html::activeLabel($model, 'namePass'); ?>

    <div class="row">
        <div class="col-md-10 col-xs-8">
            <?php echo Html::activeInput('', $model, 'namePass', ['class' => 'form-control js-copytextarea"', 'maxlength' => 255]); ?>

        </div>

    </div>
    <?php
    echo Html::activeHint($model, 'namePass', 'Длинна имени записи должна быть не меньше 4 символов');
    echo Html::error($model, 'namePass', ['class' => 'help-block']);
    echo $form->field($model, 'namePass')->end();
    ?>

    <?/*=========== Логин ===========*/?>
    <?php
    echo $form->field($model, 'usernamePass')->begin();
    echo Html::activeLabel($model, 'Логин'); ?>

    <div class="row">
        <div class="col-md-10 col-xs-8">
            <?php echo Html::activeInput('text', $model, 'usernamePass', ['class' => 'form-control js-copytextarea"', 'maxlength' => 255, 'id' => '1']); ?>

        </div>
        <div class="col-xs-2">
            <?php
            echo
            Html::tag('span', Html::button('<i class="far fa-copy "></i>', ['class' => 'btn btn-default reveal js-textareacopybtn',
                'data-id' => '1']),
                ['class' => 'input-group-btn']);
            ?>
        </div>
    </div>
    <?php
    echo Html::activeHint($model, 'usernamePass', 'Длинна логина должна быть не меньше 4 символов');
    echo Html::error($model, 'usernamePass', ['class' => 'help-block']);
    echo $form->field($model, 'usernamePass')->end();
    ?>

    <? /*==========Электронная почта=============*/ ?>
    <?php
    echo $form->field($model, 'emailUser')->begin();
    echo Html::activeLabel($model, 'Email'); ?>

    <div class="row">
        <div class="col-md-10 col-xs-8">
            <?php echo Html::activeInput('', $model, 'emailUser', ['class' => 'form-control js-copytextarea', 'maxlength' => 255, 'id' => '2']); ?>

        </div>
        <div class="col-xs-2">
            <?php
            echo
            Html::tag('span', Html::button('<i class="far fa-copy "></i>', ['class' => 'btn btn-default reveal js-textareacopybtn',
                'data-id' => '2']),
                ['class' => 'input-group-btn']);
            ?>
        </div>
    </div>
    <?php
    echo Html::error($model, 'emailUser', ['class' => 'help-block']);
    echo $form->field($model, 'emailUser')->end();
    ?>

    <? /*============= Пароль ==============*/ ?>
    <?php
    echo $form->field($model, 'passwP')->begin();
    echo Html::activeLabel($model, 'passwP'); ?>

    <div class="row">
        <div class="col-md-10 col-xs-8">
            <?php echo Html::activePasswordInput($model, 'passwP', ['class' => 'form-control pwd js-copytextarea"', 'maxlength' => 255, 'id' => '3']); ?>

        </div>
        <div class="col-xs-1">
            <?=
            Html::tag('span', Html::button('<i class="far fa-copy "></i>', ['class' => ' padding btn btn-default reveal js-textareacopybtn',
                'data-id' => '3']),
                ['class' => 'input-group-btn']);
            ?>
            <?php
            echo Html::tag('span', Html::button('<i class="glyphicon glyphicon-eye-open"></i>', ['class' => 'btn btn-default reveal']),
                ['class' => 'input-group-btn']); ?>
        </div>
    </div>

    <?php
    echo Html::activeHint($model, 'passwP', 'Длинна пароля не меньше 4 символов');
    echo Html::error($model, 'passwP', ['class' => 'help-block']);
    echo $form->field($model, 'passwP')->end();
    ?>

    <?/*========= Адрес ресурса ============*/?>
    <?php
    echo $form->field($model, 'web')->begin();
    echo Html::activeLabel($model, 'web'); ?>

    <div class="row">
        <div class="col-md-10 col-xs-8">
            <?php echo Html::activeInput('', $model, 'web', ['class' => 'form-control js-copytextarea"', 'maxlength' => 255, 'id' => '4']); ?>
        </div>
    </div>
    <?
    echo $form->field($model, 'namePass')->end();
    ?>


    <?php echo Html::submitButton('Сохранить', [
        'class' => 'btn btn-primary'
    ]); ?>


    <?php ActiveForm::end(); ?>
    <?php
    $this->registerJs("$('.js-textareacopybtn').on('click', function (event) {
        var copyTextarea = $(this).data('id');
        $('#' + copyTextarea)[0].select();

        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            console.log('Copying text command was ' + msg);
        } catch (err) {
            console.log('Oops, unable to copy');
        }
    });");
    $this->registerJs("$(\".reveal\").on('click',function() {
        var pwd = $(\".pwd\");
        if (pwd.attr('type') === 'password') {
            pwd.attr('type', 'text');
        } else {
            pwd.attr('type', 'password');
        }
    });");
    ?>

</div>

