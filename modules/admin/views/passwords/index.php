<?php

use yii\bootstrap\Modal;
use yii\bootstrap\Html;
use yii\helpers\Url;
?>
<h1>Всего записей - <?=count($noteList);?></h1>

<a href="<?php echo Url::to(['passwords/create']);?>" class="btn btn-primary btn-create">Добавить еще одну запись</a>

<? if (!empty($noteList)): ?>

<div class="table-responsive">
    <table class="table table-striped table-condensed" >
        <tr>
            <th>Имя записи</th>
            <th>Логин</th>
            <th>Электронная почта</th>
            <th>Пароль</th>
            <th>Адрес ресурса</th>
            <th>Дата редактирования</th>
            <th>Поле записи</th>
            <th>Удаление</th>
        </tr>

        <? foreach ($noteList as $userNote):?>
        <tr>
            <!--        $data = Yii::$app->getSecurity()->decryptByPassword($userNote['note'], $userNote['secretKey']);-->
            <td><p><?=$userNote['namePass']?></p></td>
            <td><span id='<?=$userNote['idPass']?>'><?=$userNote['usernamePass']?></span><a onclick="CopyToClipboard('<?=$userNote['idPass']?>')" href="#"> <i class="far fa-copy "></i></a></td>
            <td><span id='<?=$userNote['idPass']?>-1'><?=$userNote['emailUser']?></span><a onclick="CopyToClipboard('<?=$userNote['idPass']?>-1')" href="#"> <i class="far fa-copy "></i></a></td>
            <td><span id='<?=$userNote['idPass']?>-2'><?
                    $temp = Yii::$app->crypt->decrypt($userNote['passwP'], $userNote['secret_key'], $userNote['secret_iv']);
                    echo $temp;?></span><a onclick="CopyToClipboard('<?=$userNote['idPass']?>-2')" href="#"> <i class="far fa-copy "></i></a>
            </td>
            <td>
                <? if (!empty($userNote['web'])): ?>
                    <span id='<?=$userNote['idPass']?>-3'><?=$userNote['web']?></span>
                    <a onclick="CopyToClipboard('<?=$userNote['idPass']?>-3)" href="#"> <i class="far fa-copy "></i></a>
                <?php endif; ?>
            </td>
            <td><p><?=$userNote['lastModified']?></p></td>
            <td><a href="<?= Url::to(['passwords/update', 'idPass' => $userNote['idPass']]); ?>">Редактирование</a></td>
            <td>

                <?php Modal::begin([
                    'header' => '<h2>Подтвердите удаление</h2>',
                    'toggleButton' => [
                        'label' => '<i class="fas fa-trash"></i>',
                        'tag' => 'button',
                        'class' => 'btn btn-success',
                    ],
                ]);
                ?>
                <div class="form-group">
                    <?= Html::a('Подтверждаю', Url::to(['passwords/delete', 'idPass' => $userNote['idPass']]), ['class' => 'btn btn-success']) ?>

                    <?= Html::button('Передумал', ['class' => 'btn btn-danger right-button',  'data-dismiss'=> 'modal']) ?>
                </div>

                <?php Modal::end(); ?>
            </td>
            <?php
            endforeach;?>

    </table>
</div>

<?php else : ?>

<?php endif; ?>

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
        }}
</script>


