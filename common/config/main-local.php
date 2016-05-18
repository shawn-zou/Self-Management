<?php
/**
 * @author shawn-zou <157962718@qq.com> 2016年5月18日
 */
return [
    //设置目标语言
    'language' => 'zh-CN',
    //设置源语言
    'sourceLanguage' => 'zh-CN',
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
        	//必须是translations
            'translations' => [
            	//DbMessageSource,从数据库里查询，如果集成到后台管理的话，修改以后需要删除缓存
            	'lang' => [
            		'class' => 'yii\i18n\DbMessageSource',
            		//开启缓存；不开启缓存会每次都查数据库，还是开启以后必要时清空缓存比较高效
            		'enableCaching' => true,
            	],
            	//还没调试出来，不要紧，DbMessageSource可以生成缓存文件，数据库形式在后台也方便做修改
                /* 'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@common/language',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ], */
            	//框架自带的，留在这里做个说明，备忘
            	//'yii' => [],
            ],
        ],
    ],
];