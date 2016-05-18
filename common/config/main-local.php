<?php
/**
 * @author shawn-zou <1579627187@qq.com> 2016年5月18日
 */
return [
    'language' => 'zh-CN',    //语言
    //'defaultRoute' => '/user/login',    //前后台都是登录页面所以在公共设置里设置
    //'homeUrl' => '',    //首页Home设置
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
    ],
];