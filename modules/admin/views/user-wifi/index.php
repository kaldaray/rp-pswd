<?php

use yii\bootstrap\Modal;
use yii\bootstrap\Html;
use yii\helpers\Url;

?>
<h1>Всего записей - <?= count($noteList); ?></h1>

<a href="<?php echo Url::to(['user-wifi/create']); ?>" class="btn btn-primary btn-create">Добавить еще одну запись</a>

<? if (!empty($noteList)): ?>

    <div class="table-responsive">
        <table class="table table-striped table-condensed">
            <tr>
                <th>Имя записи</th>
                <th>Логин</th>
                <th>Пароль</th>
                <th>Стартовая страница</th>
                <th>Тип защиты</th>
                <th>Дата редактирования</th>
                <th>Поле записи</th>
                <th>Удаление</th>
            </tr>

            <? foreach ($noteList

            as $userNote): ?>
            <tr>
                <td><span id='display'><?= $userNote['nameWifi'] ?></span><a onclick="CopyToClipboard('display')"
                                                                             href="#"> <i class="far fa-copy "></i></a>
                </td>
                <td><span id='display1'><?= $userNote['nameUser'] ?></span><a onclick="CopyToClipboard('display1')"
                                                                             href="#"> <i class="far fa-copy "></i></a>
                </td>
                <td><span id='display2'>
                        <?
                        $temp = Yii::$app->crypt->decrypt($userNote['passwordWifi'], $userNote['secret_key'], $userNote['secret_iv']);
                        echo $temp;
                        ?>
                    </span><a onclick="CopyToClipboard('display2')" href="#"> <i class="far fa-copy "></i></a></td>
                <td><span id='display3'>
                        <?php if (!empty($userNote['startPage'])): ?>
                        <?= $userNote['startPage'] ?></span><a onclick="CopyToClipboard('display3')" href="#"> <i
                                class="far fa-copy "></i></a>
                    <?php endif; ?>
                </td>
                <td><span id='display4'><?= $userNote['nameTypeSecurity'] ?></span><a
                            onclick="CopyToClipboard('display4')" href="#"> <i class="far fa-copy "></i></a></td>
                <td><p><?= $userNote['lastModified'] ?></p></td>
                <td><a href="<?= Url::to(['user-wifi/update', 'idWifi' => $userNote['idWifi']]); ?>">Редактирование</a>
                </td>
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
                        <?= Html::a('Подтверждаю', Url::to(['user-wifi/delete', 'idWifi' => $userNote['idWifi']]), ['class' => 'btn btn-success']) ?>

                        <?= Html::button('Передумал', ['class' => 'btn btn-danger right-button', 'data-dismiss' => 'modal']) ?>
                    </div>

                    <?php Modal::end(); ?>
                </td>
                <?php
                endforeach; ?>

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
        }
    }
</script>


