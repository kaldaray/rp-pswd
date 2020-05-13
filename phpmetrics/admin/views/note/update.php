<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title='Редактирование записи';
?>
<h1>Редактирование записи с паролем</h1>

<?php $form = ActiveForm::begin(); ?>

<?//= $form->field($model, 'idUser')-> hiddenInput(Yii::$app->user->id) ?>
<?php echo $form->field($model, 'nameNote')?>
<?php echo $form->field($model, 'note')?>

<?php echo Html::submitButton('Сохранить', [
    'class' => 'btn btn-primary'
]);?>

<?php ActiveForm::end();?>

<script>
    function CopyToClipboard(containerid) {
        if (document.selection) {
            var range = document.body.createTextRange();
            range.moveToElementText(document.getElementById(containerid));
            range.select().createTextRange();
            document.execCommand("Copy");

        } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().addRange(range);
            document.execCommand("Copy");
        }
    }
</script>