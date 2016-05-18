<?php
/**
 * @author shawn-zou <1579627187@qq.com> 2016年5月18日
 */
return [
    //设置目标语言
    'language' => 'zh-CN',
    //设置源语言，文档建议用默认的en-US,说是别的语言翻译起来方便。。。干
    //'sourceLanguage' => 'zh-CN',
    //前后台的默认首页路由是一样的，所以在公共配置里设置
    //'defaultRoute' => '/user/login',
    //设置跳转的页面，$this->goHome()方法要的配置
    //'homeUrl' => '',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii2advanced',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => 'yiiad_',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        //国际化I18N配置
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/language',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
    ],
];