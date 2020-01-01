<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
<h1>Создание новой записи с паролем</h1>

<?php $form = ActiveForm::begin(); ?>

<?//= $form->field($model, 'idUser')-> hiddenInput(Yii::$app->user->id) ?>
<?php echo $form->field($model, 'nameNote')?>
<?php echo $form->field($model, 'note')?>

<?php echo Html::submitButton('Сохранить', [
        'class' => 'btn btn-primary'
]);?>

<?php ActiveForm::end();?>
