<?php
/* @var $this yii\web\View */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerJsFile('/js/survey.js', ['depends' => 'app\assets\AppAsset', 'position' => yii\web\View::POS_END]);
$this->registerCssFile('/css/main.css');
$this->title='Создание записи с беспроводными сетями';
?>
<h1>Создание новой записи с паролем</h1>

<h2><a href="/admin/user-wifi">Назад</a></h2>
<?php $form = ActiveForm::begin(); ?>

<?//= $form->field($model, 'idUser')-> hiddenInput(Yii::$app->user->id) ?>
<?php echo $form->field($model, 'nameWifi')->label('Имя записи с паролем')?>
<?php echo $form->field($model, 'nameUser')->label('Логин')?>
<?php
echo $form->field($model, 'passwordWifi')->begin();
echo Html::activeLabel($model,'passwordWifi');?>

<div class="row">
    <div class="col-md-11 col-xs-10">
        <div class="block_for_input">
            <?php echo Html::activePasswordInput($model, 'passwordWifi', ['class'=>'form-control pwd', 'id'=> 'input_test','maxlength' => 255]); ?>
            <div id="block_check"></div>
        </div>
    </div>
    <div class="col-xs-1">
        <?php
        echo Html::tag('span', Html::button('<i class="glyphicon glyphicon-eye-open"></i>', ['class' => 'btn btn-default reveal']),
            ['class' => 'input-group-btn']);
        ?>
    </div>
</div>

<?php
echo Html::activeHint($model, 'passwordWifi', 'Длинна пароля не меньше 4 символов');
echo Html::error($model,'passwordWifi', ['class' => 'help-block']);
echo $form->field($model, 'passwordWifi')->end();
?>


<?php echo $form->field($model, 'startPage')->label('Стартовая страница')?>
<?php //echo $form->field($model, 'passwP')
//            ->passwordInput(['maxlength' => 255, 'class' => 'pwd'])
//            ->hint('Длинна пароля не меньше 4 символов.')
//            ->label('Пароль');
//?>
<?php
$types = \app\models\TypeSecurity::find()->all();
// формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
$items = ArrayHelper::map($types,'idTypeSecurity','nameTypeSecurity');
echo $form->field($model, 'typeSecurity')->dropDownList($items);
?>

<?php echo Html::submitButton('Сохранить', [
    'class' => 'btn btn-primary'
]);?>

<?php ActiveForm::end();?>
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
