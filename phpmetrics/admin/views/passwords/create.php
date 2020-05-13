<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerJsFile('/js/survey.js', ['depends' => 'app\assets\AppAsset', 'position' => yii\web\View::POS_END]);
$this->registerCssFile('/css/main.css');
$this->title='Создание записи с учетной записью';
?>
<h1>Создание новой записи с паролем</h1>

<h2><a href="/admin/passwords">Назад</a></h2>
<?php $form = ActiveForm::begin(); ?>

<? //= $form->field($model, 'idUser')-> hiddenInput(Yii::$app->user->id) ?>
<?php echo $form->field($model, 'namePass')->label('Имя записи с паролем') ?>
<?php echo $form->field($model, 'usernamePass')->label('Логин') ?>
<?php echo $form->field($model, 'emailUser')->input('email')->label('Электронная почта') ?>
<?php //echo $form->field($model, 'passwP')
//            ->passwordInput(['maxlength' => 255, 'class' => 'pwd'])
//            ->hint('Длинна пароля не меньше 4 символов.')
//            ->label('Пароль');
//?>
<?php
echo $form->field($model, 'passwP')->begin();
echo Html::activeLabel($model, 'passwP'); ?>

<div class="row">
    <div class="col-md-11 col-xs-10">
        <div class="block_for_input">
            <?php echo Html::activePasswordInput($model, 'passwP', ['class' => 'form-control pwd', 'id'=> 'input_test', 'maxlength' => 255]); ?>
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
<div class="">
<?php
echo Html::activeHint($model, 'passwP', 'Длинна пароля не меньше 4 символов');
echo Html::error($model, 'passwP', ['class' => 'help-block', 'id' => 'input_test']);
echo $form->field($model, 'passwP')->end();
?>
<div id="block_check"></div>
</div>
<?php echo $form->field($model, 'web')->label('Адрес ресурса') ?>
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
