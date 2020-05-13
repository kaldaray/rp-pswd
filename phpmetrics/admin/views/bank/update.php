<?php
/* @var $this yii\web\View */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
$this->title='Редактирование записи с банковской картой';
?>

<h2><a href="/admin/passwords" class="black-arrow"><i class="fas fa-arrow-left"></i></a></h2>
<?php $form = ActiveForm::begin(); ?>

<? //= $form->field($model, 'idUser')-> hiddenInput(Yii::$app->user->id) ?>

<?php /*==================== Имя записи =======================*/?>
<?php
echo $form->field($model, 'nameCard')->begin();
echo Html::activeLabel($model, 'nameCard'); ?>

<div class="row">
    <div class="col-md-10 col-xs-10">
        <?php echo Html::activeInput('', $model, 'nameCard', ['class' => 'form-control js-copytextarea"', 'maxlength' => 255, ]); ?>
    </div>
</div>
<?php
echo Html::activeHint($model, 'nameCard', 'Длинна имени записи должна быть не меньше 4 символов');
echo Html::error($model, 'nameCard', ['class' => 'help-block']);
echo $form->field($model, 'nameCard')->end();
?>

<?php /*==================== Владелец =======================*/?>

<?php
echo $form->field($model, 'nameOwner')->begin();
echo Html::activeLabel($model, 'nameOwner'); ?>

<div class="row">
    <div class="col-md-10 col-xs-10">
        <?php echo Html::activeInput('', $model, 'nameOwner', ['class' => 'form-control js-copytextarea"', 'maxlength' => 255, 'id' => '1']); ?>

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
echo Html::activeHint($model, 'nameOwner', 'Длинна поля владелец должна быть не менее 4 символов');
echo Html::error($model, 'nameOwner', ['class' => 'help-block']);
echo $form->field($model, 'nameOwner')->end();
?>

<?php /*==================== Номер карты =======================*/?>

<?php
echo $form->field($model, 'numberCard')->begin();
echo Html::activeLabel($model, 'numberCard'); ?>

<div class="row">
    <div class="col-md-10 col-xs-10">
        <?php echo Html::activePasswordInput($model, 'numberCard', ['class' => 'form-control pwd2', 'maxlength' => 255, 'id' => '2']); ?>

    </div>
    <div class="col-xs-2">
        <?php
        echo
        Html::tag('span', Html::button('<i class="glyphicon glyphicon-eye-open"></i>', ['class' => 'btn btn-default reveal',
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
echo Html::activeHint($model, 'numberCard', 'Длинна номера карты должна быть не менее 10 символов');
echo Html::error($model, 'numberCard', ['class' => 'help-block']);
echo $form->field($model, 'numberCard')->end();
?>

<?php /*==================== Тип карты =======================*/?>

<div class="row">
    <div class="col-md-10 col-xs-10">
        <?php
        $types = \app\models\TypeCard::find()->all();
        // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
        $items = ArrayHelper::map($types,'idCard','nameTypeCard');
        echo $form->field($model, 'typeCard')->dropDownList($items);
        ?>
    </div>

</div>
<?php /*==================== CVV =======================*/?>


<?php
echo $form->field($model, 'svc')->begin();
echo Html::activeLabel($model, 'svc'); ?>

<div class="row">
    <div class="col-md-10 col-xs-10">
        <?php echo Html::activePasswordInput($model, 'svc', ['class' => 'form-control pwd3', 'maxlength' => 10, 'id' => '3']); ?>

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
echo Html::error($model, 'svc', ['class' => 'help-block']);
echo $form->field($model, 'svc')->end();
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
        var pwd = $(\".pwd\"+$(this).data('id'));
        if (pwd.attr('type') === 'password') {
            pwd.attr('type', 'text');
        } else {
            pwd.attr('type', 'password');
        }
    });");
?>
<script>

</script>

