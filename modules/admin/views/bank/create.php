<?php
/* @var $this yii\web\View */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>
<h1>Создание новой записи с паролем</h1>

<h2><a href="/admin/passwords">Назад</a></h2>
<?php $form = ActiveForm::begin(); ?>

<? //= $form->field($model, 'idUser')-> hiddenInput(Yii::$app->user->id) ?>
<?php echo $form->field($model, 'nameCard')->label('Имя записи с паролем') ?>
<?php echo $form->field($model, 'nameOwner')->label('Владелец') ?>
<?php //echo $form->field($model, 'passwP')
//            ->passwordInput(['maxlength' => 255, 'class' => 'pwd'])
//            ->hint('Длинна пароля не меньше 4 символов.')
//            ->label('Пароль');
//?>
<?php
echo $form->field($model, 'numberCard')->begin();
echo Html::activeLabel($model, 'numberCard'); ?>

<div class="row">
    <div class="col-md-11 col-xs-10">
        <?php echo Html::activePasswordInput($model, 'numberCard', ['class' => 'form-control pwd', 'maxlength' => 255]); ?>
    </div>
    <div class="col-xs-1">
        <?php
        echo Html::tag('span', Html::button('<i class="glyphicon glyphicon-eye-open"></i>', ['class' => 'btn btn-default reveal']),
            ['class' => 'input-group-btn']);
        ?>
    </div>
</div>

<?php
echo Html::activeHint($model, 'numberCard', 'Длинна карты от 14 символов');
echo Html::error($model, 'numberCard', ['class' => 'help-block']);
echo $form->field($model, 'numberCard')->end();
?>

<?php
$types = \app\models\TypeCard::find()->all();
// формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
$items = ArrayHelper::map($types,'idCard','nameTypeCard');
echo $form->field($model, 'typeCard')->dropDownList($items);
?>
<?php echo $form->field($model, 'svc')->textInput()?>
<?php //echo $form->field($model, 'validity')->widget(
//    DateTimePicker::class,
//    [
//        'options' => ['placeholder' => 'Select operating time ...'],
//        'convertFormat' => true,
//        'pluginOptions' => [
//            'format' => 'd-M-Y g:i A',
//            'startDate' => '01-Mar-2014 12:00 AM',
//            'todayHighlight' => true
//        ]
//    ]
//);
//
//]?>


<?php echo Html::submitButton('Сохранить', [
    'class' => 'btn btn-primary'
]); ?>

<?php ActiveForm::end(); ?>
<?php
$this->registerJs("$(\".reveal\").on('click',function() {
        var pwd = $(\".pwd\");
        if (pwd.attr('type') === 'password') {
            pwd.attr('type', 'text');
        } else {
            pwd.attr('type', 'password');
        }
    });");
?>
