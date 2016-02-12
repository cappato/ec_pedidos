<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'language' => 'es-ES',
    'bootstrap' => ['log'],
    'modules' => [
   'datecontrol' =>  [
        'class' => '\kartik\datecontrol\Module'
    ]
],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'sOaiio3TQx1Pz031eOJRwdQ7rTb7Y95n',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
                'session'=>[
                    'timeout'=>5,
                     'name' => 'USUARIOSSESSID',
                    'savePath' => sys_get_temp_dir(),
        ],
        'user' => [
            'identityClass' => 'app\models\User',
                         'identityCookie' => [
                'name' => '_usuarios', // unique for frontend
            ],
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
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        //'db' => require(__DIR__ . '/db.php'),
          'dbIntranet' => require(__DIR__ . '/dbIntranet.php'),
          'dbStadio'   => require(__DIR__ . '/dbStadio.php'),
    ],
    'params' => $params,

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['192.168.2.95']
    ];
}

return $config;
