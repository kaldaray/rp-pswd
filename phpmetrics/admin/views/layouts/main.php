<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

/**
 * Created by Yukal Alexander
 * Date: 29.01.17
 * Time: 11:35
 *
 *
 * User-Agent standards:
 *
 * RFC2616 (section 14.43, page 144)
 * http://www.ietf.org/rfc/rfc2616.txt
 *
 * RFC7231 (section 5.5.3, page 46)
 * https://tools.ietf.org/html/rfc7231#section-5.5.3
 *
 * User-Agent string template:
 * User-Agent: Mozilla/<version> (<system-information>) <platform> (<platform-details>) <extensions>
 *
 *
 * More about different User-Agent strings
 *
 * https://udger.com/resources/ua-list
 * https://developer.mozilla.org/ru/docs/Web/HTTP/Headers/User-Agent
 * https://deviceatlas.com/blog/user-agent-string-analysis
 * https://deviceatlas.com/blog/list-of-user-agent-strings
 * https://msdn.microsoft.com/en-us/library/ms537503(v=vs.85).aspx
 * https://developer.chrome.com/multidevice/user-agent
 * https://www.sitepoint.com/server-side-device-detection-with-browscap/
 *
 */
/**
 * Created by Yukal Alexander
 * Date: 29.01.17
 * Time: 11:35
 *
 *
 * User-Agent standards:
 *
 * RFC2616 (section 14.43, page 144)
 * http://www.ietf.org/rfc/rfc2616.txt
 *
 * RFC7231 (section 5.5.3, page 46)
 * https://tools.ietf.org/html/rfc7231#section-5.5.3
 *
 * User-Agent string template:
 * User-Agent: Mozilla/<version> (<system-information>) <platform> (<platform-details>) <extensions>
 *
 *
 * More about different User-Agent strings
 *
 * https://udger.com/resources/ua-list
 * https://developer.mozilla.org/ru/docs/Web/HTTP/Headers/User-Agent
 * https://deviceatlas.com/blog/user-agent-string-analysis
 * https://deviceatlas.com/blog/list-of-user-agent-strings
 * https://msdn.microsoft.com/en-us/library/ms537503(v=vs.85).aspx
 * https://developer.chrome.com/multidevice/user-agent
 * https://www.sitepoint.com/server-side-device-detection-with-browscap/
 *
 */
if (Yii::$app->controller->action->id === 'login') { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
