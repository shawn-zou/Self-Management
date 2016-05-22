<?php
namespace backend\assets;

use Yii;
use yii\web\AssetBundle;

/**
 * @author shawn-zou <157962718@qq.com> 2016年5月22日
 * 用于管理员登录时的前端layout
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $css = [
    	'css/login.css'
    ];

    public $js = [];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    	'yii\bootstrap\BootstrapPluginAsset',
    ];
}