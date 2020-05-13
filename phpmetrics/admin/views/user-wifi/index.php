<?php

use yii\bootstrap\Modal;
use yii\bootstrap\Html;
use yii\helpers\Url;

?>
<h1>Всего записей - <?= count($noteList); ?></h1>

<a href="<?php echo Url::to(['user-wifi/create']); ?>" class="btn btn-primary btn-create">Добавить еще одну запись</a>

<? if (!empty($noteList)): ?>
<div class="container">
    <?php
    //Columns must be a factor of 12 (1,2,3,4,6,12)
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
                        <?= Html::a('Подтверждаю', Url::to(['user-wifi/delete', 'idWifi' => $userNote['idWifi']]), ['class' => 'btn btn-success']) ?>

                        <?= Html::button('Передумал', ['class' => 'btn btn-danger right-button',  'data-dismiss'=> 'modal']) ?>
                    </div>

                    <?php Modal::end(); ?>

                    <div class="caption text-center"
                         onclick="location.href='<?= Url::to(['user-wifi/update', 'idWifi' => $userNote['idWifi']]); ?>'">
                        <h4 class="thumbnail-label"><?=$userNote['nameWifi']?></h4>

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


