<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_name') ?>

    <?= $form->field($model, 'user_pwd') ?>

    <?= $form->field($model, 'salt') ?>

    <?= $form->field($model, 'user_pwd_hash') ?>

    <?php // echo $form->field($model, 'user_email') ?>

    <?php // echo $form->field($model, 'email_code') ?>

    <?php // echo $form->field($model, 'user_email_status') ?>

    <?php // echo $form->field($model, 'user_phonenum') ?>

    <?php // echo $form->field($model, 'user_phone_status') ?>

    <?php // echo $form->field($model, 'is_status') ?>

    <?php // echo $form->field($model, 'user_nickname') ?>

    <?php // echo $form->field($model, 'user_realname') ?>

    <?php // echo $form->field($model, 'user_sex') ?>

    <?php // echo $form->field($model, 'user_location') ?>

    <?php // echo $form->field($model, 'user_emotional_state') ?>

    <?php // echo $form->field($model, 'user_birthday') ?>

    <?php // echo $form->field($model, 'user_blood_type') ?>

    <?php // echo $form->field($model, 'user_introduction') ?>

    <?php // echo $form->field($model, 'user_qq') ?>

    <?php // echo $form->field($model, 'user_img') ?>

    <?php // echo $form->field($model, 'user_creatime') ?>

    <?php // echo $form->field($model, 'user_updatime') ?>

    <?php // echo $form->field($model, 'login_ip') ?>

    <?php // echo $form->field($model, 'login_time') ?>

    <?php // echo $form->field($model, 'is_delete') ?>

    <?php // echo $form->field($model, 'user_education_id') ?>

    <?php // echo $form->field($model, 'user_job_id') ?>

    <?php // echo $form->field($model, 'user_tag_id') ?>

    <?php // echo $form->field($model, 'user_shipping_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
