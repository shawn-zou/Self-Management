<?php
/**
 * @author shawn-zou <157962718@qq.com> 2016年5月17日
 * 用于登录、注册、找回密码等未登录时的前端layout
 */
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use frontend\assets\BasisAsset;
use common\widgets\Alert;

BasisAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

	<div class="wrap">
	    <div class="container">
	        <?/* = Alert::widget()  */?>
	        <?=
	        	//其它页面内容
	        	$content
	        ?>
	    </div>
	</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>