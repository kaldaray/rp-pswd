<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$this->title = "Red Panda PSWD";
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'innerContainerOptions' => ['class' => 'container navbar navbar-default', 'id' => 'header-container'],
        //'brandLabel' => Html::img('@web/images/logo2.png', ['alt'=>Yii::$app->name]),
        'brandLabel' => '<img src="/images/logo2.png" class="img-responsive img logo" alt="logo"/>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => ' navbar-collapse',
            'id' => 'header',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/']],
            ['label' => 'О нас', 'url' => ['/about']],
            ['label' => 'Регистрация', 'url' => ['/register']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Вход', 'url' => ['/login/']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>


        <div class="container ">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>

    <?php $this->beginContent('@app/views/layouts/footer.php'); ?>
    <?php $this->endContent(); ?>

</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
