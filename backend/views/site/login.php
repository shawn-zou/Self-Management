<?php
/**
 * @author shawn-zou <157962718@qq.com> 2016年5月22日
 */
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $objLogin \backend\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = Yii::t('lang', '后台登录系统');
?>
<div class="admin-login">
    <h3><?= Html::encode($this->title) ?></h3>

    <div class="row">
        <div class="">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($objLogin, 'admin_name')->label('')->textInput(['placeholder' => Yii::t('lang', '登录名'), 'autofocus' => true]) ?>

                <?= $form->field($objLogin, 'password')->label('')->passwordInput(['placeholder' => Yii::t('lang', '密码')]) ?>

                <?= $form->field($objLogin, 'rememberMe')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('lang', '登录'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>