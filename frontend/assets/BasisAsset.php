<?php
namespace frontend\assets;

use Yii;
use yii\web\AssetBundle;
use yii\helpers\ArrayHelper;

/**
 * @author shawn-zou <157962718@qq.com> 2016年5月21日
 * 用于登录、注册、找回密码等未登录时的前端layout
 */
class BasisAsset extends AssetBundle
{
	//根据不同的controller和action加载不同的css,js
	public function __construct()
	{
		$controllerId = Yii::$app->controller->id;
		$actionId = Yii::$app->controller->action->id;

		$arrCss = array();
		$arrJs = array();
		if($controllerId === 'user')
		{
			switch($actionId)
			{
				case 'signup':
					{
						$arrCss = array();
						$arrJs = array();
						break;
					}
			}
		}

		$this->css = ArrayHelper::merge($this->css, $arrCss);
		$this->js = ArrayHelper::merge($this->js, $arrJs);
	}

    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $css = [
        //'css/site.css',
    ];

    public $js = [
    ];

    public $depends = [
    	//common文件下的前后台公用资源
    	'common\source\CommonAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    	'yii\bootstrap\BootstrapPluginAsset',
    ];
}