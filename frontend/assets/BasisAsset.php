<?php
namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author shawn-zou <157962718@qq.com> 2016年5月17日
 * 用于登录、注册、找回密码等未登录时的前端layout
 */
class BasisAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $css = [
        //'css/site.css',
    ];

    public $js = [
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}