<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AdminSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'admin_name') ?>

    <?= $form->field($model, 'admin_pwd_hash') ?>

    <?= $form->field($model, 'auth_key') ?>

    <?= $form->field($model, 'real_name') ?>

    <?php // echo $form->field($model, 'phonenum') ?>

    <?php // echo $form->field($model, 'phone_active_token') ?>

    <?php // echo $form->field($model, 'phone_status') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'email_active_token') ?>

    <?php // echo $form->field($model, 'email_status') ?>

    <?php // echo $form->field($model, 'is_forbidden') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('lang', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('lang', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
