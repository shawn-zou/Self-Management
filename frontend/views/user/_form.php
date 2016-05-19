<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_pwd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'salt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_pwd_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_pwd_reset_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_email_activate_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_email_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_phonenum')->textInput() ?>

    <?= $form->field($model, 'user_phone_activate_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_phone_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_nickname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_realname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_sex')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_emotional_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_birthday')->textInput() ?>

    <?= $form->field($model, 'user_blood_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_introduction')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_qq')->textInput() ?>

    <?= $form->field($model, 'user_img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'login_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'login_time')->textInput() ?>

    <?= $form->field($model, 'is_delete')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_forbidden')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_education_id')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_job_id')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_tag_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_shipping_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('lang', 'Create') : Yii::t('lang', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
