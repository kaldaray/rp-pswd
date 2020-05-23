<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$config = [
    'id' => 'password-app',
    'language' => 'ru-RU',
    'sourceLanguage' => 'en-US',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'name' => 'Red Panda PSWD',
    'modules' => [
        'encrypter' => 'nickcv\encrypter\Module',
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => 'main',
        ],
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'EzFkVjx7rC1eZRFnEoUsSuSOR4DBwmPF',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'encrypter' => require(__DIR__ . DIRECTORY_SEPARATOR . 'encrypter.php'),
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],

        'crypt' => [
            'class' => 'app\components\Crypt',
        ],
        'gener' => [
            'class' => 'app\components\Gener',
        ],
        'aes' => [
            'class' => 'app\components\Rsa',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'pattern' => 'login',
                    'route' => 'login/index'
                ],
                [
                    'pattern' => 'about',
                    'route' => 'site/about'
                ],
                [
                    'pattern' => 'contact',
                    'route' => 'site/contact'
                ],
                [
                    'pattern' => 'register',
                    'route' => 'register/index'
                ],
                [
                    'pattern' => 'test',
                    'route' => 'site/test'
                ],
                [
                    'pattern' => 'send-email',
                    'route' => 'site/send-email'
                ],
                [
                    'pattern' => 'login/<action:[\-\w]+>',
                    'route' => 'login/<action>',
                ],
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>'
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
