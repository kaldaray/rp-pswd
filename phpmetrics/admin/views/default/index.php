<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
$this->title = 'Менеджер паролей';
?>
<div class="admin-default-index">

    <h1> Общее количество записей пользователя -
        <?= $noteList ?>

    </h1>

    <div class="row text-center mt-25">
        <div class="col-sm-6">
            <div class="thumbnail">
                <div class="caption text-center"
                     onclick="location.href='/admin/passwords/create'">
                    <h4 id="thumbnail-label"><a href=/admin/passwords/create"
                                                target="_blank">Учетная запись</a></h4>

                    <div class="thumbnail-description smaller">Создайте запись с паролем, в которой будут храниться
                        данные от Ваших учетных записей
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="thumbnail">
                <div class="caption text-center"
                     onclick="location.href='/admin/note/create'">
                    <h4 id="thumbnail-label"><a href=/admin/note/create"
                                                target="_blank">Защищенная запись</a></h4>

                    <div class="thumbnail-description smaller">
                        Создайте защищенную запись, зашифрованную специальным алгоритмом
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-center mt-25">
        <div class="col-sm-6">
            <div class="thumbnail">
                <div class="caption text-center"
                     onclick="location.href='/admin/bank/create'">
                    <h4 id="thumbnail-label"><a href=/admin/bank/create"
                                                target="_blank">Банковская карта</a></h4>

                    <div class="thumbnail-description smaller">Создайте запись с данными банковской карты, данные карты
                        зашифрованны специальным алгоритмом
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="thumbnail">
                <div class="caption text-center"
                     onclick="location.href='/admin/user-wifi/create'">
                    <h4 id="thumbnail-label"><a href=/admin/user-wifi/create"
                                                target="_blank">Беспроводные сети</a></h4>

                    <div class="thumbnail-description smaller">
                        Создайте защищенную запись, в которой хранятся данные от беспроводных сетей
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h2>Последние записи</h2>

    <?/* if (!empty($wifiList)): */?><!--
        <div class="container">
            <?php
/*            //Колонок может быть не больше 12 (1,2,3,4,6,12)
            $numOfCols = 3;
            $rowCount = 0;
            $bootstrapColWidth = 12 / $numOfCols;
            $countSql = 0;
            */?>
            <div class="row text-center margin-top">
                <?php
/*
                $sqlQueryArray = array(
                    array('bank', 'idCardUser', 'nameCard', 'Банковские карты'),
                    array('passwords', 'idPass', 'namePass', 'Учетные записи'),
                    array('user-wifi', 'idWifi', 'nameWifi', 'Сети'),
                    array('note', 'idNotes', 'nameNote', 'Записи'),
                );
                /*$sqlQueryArray = array(
                    array('user-wifi', 'idWifi', 'nameWifi', 'Сети'),
                    array('passwords', 'idPass', 'namePass', 'Учетные записи'),
                    array('bank', 'idCardUser', 'nameCard', 'Банковские карты'),
                    array('note', 'idNotes', 'nameNote', 'Записи'),
                );*/
                /*foreach ($wifiList as $userNote) {
                    */?>
                    <div class="col-sm-4 col-md-4">
                        <h3><?/*=$sqlQueryArray[$countSql][3]*/?></h3>
                        <div class="thumbnail">

                            <?php /*Modal::begin([
                                'header' => '<h2>Подтвердите удаление</h2>',
                                'toggleButton' => [
                                    'label' => '<i class="fas fa-times"></i>',
                                    'tag' => 'button',
                                    'class' => 'btn btn-right btn-danger',
                                ],
                            ]);
                            */?>
                            <div class="form-group">
                                <?/*= Html::a('Подтверждаю', Url::to([$sqlQueryArray[$countSql][0]. '/delete',
                                    $sqlQueryArray[$countSql][1] => $userNote[$sqlQueryArray[$countSql][1]]]), ['class' => 'btn btn-success']) */?>

                                <?/*= Html::button('Передумал', ['class' => 'btn btn-danger right-button', 'data-dismiss' => 'modal']) */?>
                            </div>

                            <?php /*Modal::end(); */?>

                            <div class="caption text-center"
                                 onclick="location.href='<?/*= Url::to([$sqlQueryArray[$countSql][0].'/update',
                                     $sqlQueryArray[$countSql][1] => $userNote[$sqlQueryArray[$countSql][1]]]); */?>'">
                                <h4 class="thumbnail-label"><?/*= $userNote[$sqlQueryArray[$countSql][2]] */?></h4>

                            </div>
                        </div>
                    </div>
                    <?php
/*                    $countSql++;
                    $rowCount++;
                    if ($rowCount % $numOfCols == 0) echo '</div><div class="row text-center margin-top">';
                }
                */?>
            </div>
        </div>

    <?php /*else : */?>

    --><?php /*endif; */?>
    <? if (!empty($wifiList)): ?>
        <div class="container">
            <?php
            //Колонок может быть не больше 12 (1,2,3,4,6,12)
            $numOfCols = 3;
            $rowCount = 0;
            $bootstrapColWidth = 12 / $numOfCols;
            $countSql = 0;
            $sqlQueryArray = array(
                array('bank', 'idCardUser', 'nameCard', 'Банковские карты', $countQuery[0]),
                array('passwords', 'idPass', 'namePass', 'Учетные записи', $countQuery[1]),
                array('user-wifi', 'idWifi', 'nameWifi', 'Сети', $countQuery[2]),
                array('note', 'idNotes', 'nameNote', 'Записи', $countQuery[3]),
            );
            for ($countSql = 0; $countSql <= count($countQuery); $countSql++)
            {
            if ($countQuery[$countSql] == 0)
                continue;

            ?>
            <div class="row text-center margin-top">
                <?php
                foreach ($wifiList   as $userNote) {
                    $name_type = $sqlQueryArray[$countSql][3];
                    $url_note = $sqlQueryArray[$countSql][0];
                    $id_note = $sqlQueryArray[$countSql][1];
                    $namePole = $sqlQueryArray[$countSql][2];
                    $name_note = $userNote[$sqlQueryArray[0][2]];
                    $id = $userNote[$sqlQueryArray[0][1]];
                    ?>

                    <div class="col-sm-4 col-md-4">
                        <h3><?=$name_type?></h3>
                        <div class="thumbnail">

                            <?php Modal::begin([
                                'header' => '<h2>Подтвердите удаление</h2>',
                                'toggleButton' => [
                                    'label' => '<i class="fas fa-times"></i>',
                                    'tag' => 'button',
                                    'class' => 'btn btn-right btn-danger',
                                ],
                            ]);
                            ?>
                            <div class="form-group">
                                <?= Html::a('Подтверждаю', Url::to([$url_note. '/delete',
                                    $id_note => $userNote[$sqlQueryArray[0][1]]]), ['class' => 'btn btn-success']) ?>

                                <?= Html::button('Передумал', ['class' => 'btn btn-danger right-button', 'data-dismiss' => 'modal']) ?>
                            </div>

                            <?php Modal::end(); ?>

                            <div class="caption text-center"
                                 onclick="location.href='<?= Url::to([$url_note.'/update',
                                     $id_note => $id]); ?>'">
                                <h4 class="thumbnail-label"><?= $name_note ?></h4>

                            </div>
                        </div>
                    </div>
                    <?php
                    $countSql++;
                    $rowCount++;
                    if ($rowCount % $numOfCols == 0) echo '</div><div class="row text-center margin-top">';
                }
                }
                ?>
            </div>
        </div>

    <?php else : ?>

    <?php endif; ?>

</div>
