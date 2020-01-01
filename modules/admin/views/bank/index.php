<?php

use yii\bootstrap\Modal;
use yii\bootstrap\Html;
use yii\helpers\Url;
?>
<h1>Всего записей - <?=count($noteList);?></h1>

<a href="<?php echo Url::to(['bank/create']);?>" class="btn btn-primary btn-create">Добавить еще одну запись</a>

<? if (!empty($noteList)): ?>
    <div class="table-responsive">
        <table class="table table-striped table-condensed" >
            <tr>
                <th>Имя записи</th>
                <th>Имя владельца</th>
                <th>Номер карты</th>
                <th>Тип карты</th>
                <th>CVV</th>
<!--      <th>Срок годности</th>          -->
                <th>Дата Создания</th>
                <th>Дата редактирования</th>
                <th>Поле записи</th>
                <th>Удаление</th>
            </tr>

            <? foreach ($noteList as $userNote):?>
            <tr>
                <!--        $data = Yii::$app->getSecurity()->decryptByPassword($userNote['note'], $userNote['secretKey']);-->
                <td><p><?=$userNote['nameCard']?></p></td>
                <td><p><?=$userNote['nameOwner']?></p></td>
                <td><span id='display'>
                <?
                $temp = Yii::$app->crypt->decrypt($userNote['numberCard'], $userNote['secret_key'], $userNote['secret_iv']);
                echo $temp;?>
                </span><a onclick="CopyToClipboard('display')" href="#"> <i class="far fa-copy "></i></a>
                </td>
                <td><span id='display2'><?= $userNote['nameTypeCard'] ?></span><a
                            onclick="CopyToClipboard('display2')" href="#"> <i class="far fa-copy "></i></a></td>
                <td><span id='display3'>
                        <?
                        $temp = Yii::$app->crypt->decrypt($userNote['svc'], $userNote['secret_key'], $userNote['secret_iv']);
                        echo $temp;?>
                    </span><a
                            onclick="CopyToClipboard('display3')" href="#"> <i class="far fa-copy "></i></a></td>
<!--                <td><span id='display'>--><?//= $userNote['validity'] ?><!--</span><a-->
<!--                            onclick="CopyToClipboard('display')" href="#"> <i class="far fa-copy "></i></a></td>-->
                <td><p><?=$userNote['lastModified']?></p></td>
                <td><p><?=$userNote['created']?></p></td>
                <td><a href="<?= Url::to(['bank/update', 'idCardUser' => $userNote['idCardUser']]); ?>">Редактирование</a></td>
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
                        <?= Html::a('Подтверждаю', Url::to(['bank/delete', 'idCardUser' => $userNote['idCardUser']]), ['class' => 'btn btn-success']) ?>

                        <?= Html::button('Передумал', ['class' => 'btn btn-danger right-button',  'data-dismiss'=> 'modal']) ?>
                    </div>

                    <?php Modal::end(); ?>
                </td>
                <?php endforeach;?>
        </table>
    </div>

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
<?php else : ?>
    <h2>Добавьте запись</h2>
<?php endif; ?>




