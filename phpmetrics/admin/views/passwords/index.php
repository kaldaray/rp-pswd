<?php

use yii\bootstrap\Modal;
use yii\bootstrap\Html;
use yii\helpers\Url;

$this->title = 'Учетные записи';
?>
<h1>Всего записей - <?=count($noteList);?></h1>

<a href="<?php echo Url::to(['passwords/create']);?>" class="btn btn-primary btn-create">Добавить еще одну запись</a>

<? if (!empty($noteList)): ?>

    <div class="container">
        <?php
        //Количество колонок до 12 (1,2,3,4,6,12)
        $numOfCols = 2;
        $rowCount = 0;
        $bootstrapColWidth = 12 / $numOfCols;
        ?>
        <div class="row text-center margin-top">
            <?php

            foreach ($noteList as $userNote){
                ?>
                <div class="col-sm-5 col-md-5">
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
                            <?= Html::a('Подтверждаю', Url::to(['passwords/delete', 'idPass' => $userNote['idPass']]), ['class' => 'btn btn-success']) ?>

                            <?= Html::button('Передумал', ['class' => 'btn btn-danger right-button',  'data-dismiss'=> 'modal']) ?>
                        </div>

                        <?php Modal::end(); ?>
                        <div class="caption text-center"
                             onclick="location.href='<?= Url::to(['passwords/update', 'idPass' => $userNote['idPass']]); ?>'">
                            <h4 class="thumbnail-label"><?=$userNote['namePass']?></h4>

                        </div>
                    </div>
                </div>
                <?php
                $rowCount++;
                if($rowCount % $numOfCols == 0) echo '</div><div class="row text-center margin-top">';
            }
            ?>
        </div>
    </div>

<?php else : ?>

<?php endif; ?>