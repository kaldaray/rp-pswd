<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;

$this->title = 'Результаты поиска';
?>
<div class="admin-default-index">

    <h2>Результаты поиска</h2>

    <? if (!empty($searchList)): ?>
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
                foreach ($searchList as $userNote) {
                    $name_type = $sqlQueryArray[$countSql][3];
                    $url_note = $sqlQueryArray[$countSql][0];
                    $id_note = $sqlQueryArray[$countSql][1];
                    $namePole = $sqlQueryArray[$countSql][2];
                    $name_note = $userNote[$sqlQueryArray[0][2]];
                    $id = $userNote[$sqlQueryArray[0][1]]
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
                    //$countSql++;
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
