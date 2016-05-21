<?php
namespace common\source;

use yii\web\AssetBundle;

/**
 * @author shawn-zou <157962718@qq.com> 2016年5月21日
 * 设置前后台公用的资源包
 */
class CommonAsset extends AssetBundle
{
	public $sourcePath = '@common/source';

	public $css = [
		'font-awesome-4.5.0/font-awesome.min.css',
		'sweetalert-1.1.3/sweetalert.css',
		'owl.carousel.2.0.0-beta.2.4/owl.carousel.css',
	];

	public $js = [
		'sweetalert-1.1.3/sweetalert.min.js',
		'owl.carousel.2.0.0-beta.2.4/owl.carousel.min.js',
	];
}