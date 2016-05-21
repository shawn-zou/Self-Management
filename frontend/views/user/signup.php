<?php
/**
 * @author shawn-zou <1579627187@qq.com> 2016年5月18日
 * 注册页面
 */
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $objSignup \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = '注册';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($objSignup, 'user_name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($objSignup, 'user_email') ?>

                <?= $form->field($objSignup, 'user_pwd')->passwordInput() ?>

				<?= $form->field($objSignup, 'pwd_confirm')->passwordInput() ?>

				<?= $form->field($objSignup, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>