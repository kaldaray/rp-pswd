<?php
/* @var $this yii\web\View */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
$this->title='Редактирование записи с беспроводными сетями';
?>
<h2><a href="/admin/passwords" class="black-arrow"><i class="fas fa-arrow-left"></i></a></h2>
<div class="container">
    <?php $form = ActiveForm::begin(); ?>

    <?php /*==================== Имя записи =======================*/ ?>
    <?php
    echo $form->field($model, 'nameWifi')->begin();
    echo Html::activeLabel($model, 'nameWifi'); ?>

    <div class="row">
        <div class="col-md-10 col-xs-10">
            <?php echo Html::activeInput('', $model, 'nameWifi', ['class' => 'form-control js-copytextarea"', 'maxlength' => 255,]); ?>
        </div>
    </div>
    <?php
    echo Html::activeHint($model, 'nameWifi', 'Длинна имени записи должна быть не меньше 4 символов');
    echo Html::error($model, 'nameWifi', ['class' => 'help-block']);
    echo $form->field($model, 'nameWifi')->end();
    ?>

    <?php /*==================== Логин =======================*/ ?>
    <?php
    echo $form->field($model, 'nameUser')->begin();
    echo Html::activeLabel($model, 'nameUser'); ?>

    <div class="row">
        <div class="col-md-10 col-xs-10">
            <?php echo Html::activeInput('', $model, 'nameUser', ['class' => 'form-control js-copytextarea"', 'maxlength' => 255, 'id' => '1', 'data-id' => '1']); ?>
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
    echo Html::activeHint($model, 'nameUser', 'Длинна имени записи должна быть не меньше 4 символов');
    echo Html::error($model, 'nameUser', ['class' => 'help-block']);
    echo $form->field($model, 'nameUser')->end();
    ?>

    <?php
    echo $form->field($model, 'passwordWifi')->begin();
    echo Html::activeLabel($model, 'passwordWifi'); ?>

    <div class="row">
        <div class="col-md-10 col-xs-10">
            <?php echo Html::activePasswordInput($model, 'passwordWifi', ['class' => 'form-control pwd2', 'maxlength' => 255, 'id' => '2']); ?>
        </div>
        <div class="col-xs-2">
            <?php
            echo Html::tag('span', Html::button('<i class="glyphicon glyphicon-eye-open"></i>', ['class' => 'btn btn-default reveal',
                'data-id' => '2']),
                ['class' => 'input-group-btn']);
            echo
            Html::tag('span', Html::button('<i class="far fa-copy "></i>', ['class' => 'btn btn-default reveal js-textareacopybtn',
                'data-id' => '2']),
                ['class' => 'input-group-btn']);
            ?>
        </div>
    </div>

    <?php
    echo Html::activeHint($model, 'passwordWifi', 'Длинна пароля не меньше 4 символов');
    echo Html::error($model, 'passwordWifi', ['class' => 'help-block']);
    echo $form->field($model, 'passwordWifi')->end();
    ?>

    <?/*================= Стартовая страница ====================*/?>
    <?php
    echo $form->field($model, 'startPage')->begin();
    echo Html::activeLabel($model, 'startPage'); ?>

    <div class="row">
        <div class="col-md-10 col-xs-10">
            <?php echo Html::activePasswordInput($model, 'startPage', ['class' => 'form-control pwd3', 'maxlength' => 255, 'id' => '3']); ?>
        </div>
        <div class="col-xs-2">
            <?php
            echo
            Html::tag('span', Html::button('<i class="glyphicon glyphicon-eye-open"></i>', ['class' => 'btn btn-default reveal',
                'data-id' => '3']),
                ['class' => 'input-group-btn']);
            echo
            Html::tag('span', Html::button('<i class="far fa-copy "></i>', ['class' => 'btn btn-default reveal js-textareacopybtn',
                'data-id' => '3']),
                ['class' => 'input-group-btn']);
            ?>
        </div>
    </div>

    <?php
    echo $form->field($model, 'startPage')->end();
    ?>

    <?/*================= Тип шифрования ====================*/?>

    <div class="row">
        <div class="col-md-10 col-xs-10">

            <?php
            $types = \app\models\TypeSecurity::find()->all();
            // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
            $items = ArrayHelper::map($types, 'idTypeSecurity', 'nameTypeSecurity');
            echo $form->field($model, 'typeSecurity')->dropDownList($items);
            ?>
        </div>
        <div class="col-xs-2">
           
        </div>
    </div>

    <?php
    echo $form->field($model, 'startPage')->end();
    ?>


    <?php echo Html::submitButton('Сохранить', [
        'class' => 'btn btn-primary'
    ]); ?>

    <?php ActiveForm::end(); ?>
</div>
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
        var pwd = $(\".pwd\"+$(this).data('id'));
        if (pwd.attr('type') === 'password') {
            pwd.attr('type', 'text');
        } else {
            pwd.attr('type', 'password');
        }
    });");
?>
