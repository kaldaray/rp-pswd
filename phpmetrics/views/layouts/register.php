<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;

$this->title = 'Регистрация';
$this->registerCssFile('css/login.css');
$this->registerCssFile('css/util.css');
$this->registerCssFile('vendor/animate/animate.css');
$this->registerCssFile('fonts/Linearicons-Free-v1.0.0/icon-font.min.css');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" rel="stylesheet">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?= $content ?>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

