<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_name',
            'user_pwd',
            'salt',
            'user_pwd_hash',
            'user_email:email',
            'email_code:email',
            'user_email_status:email',
            'user_phonenum',
            'user_phone_status',
            'is_status',
            'user_nickname',
            'user_realname',
            'user_sex',
            'user_location',
            'user_emotional_state',
            'user_birthday',
            'user_blood_type',
            'user_introduction:ntext',
            'user_qq',
            'user_img',
            'user_creatime:datetime',
            'user_updatime:datetime',
            'login_ip',
            'login_time:datetime',
            'is_delete',
            'user_education_id:ntext',
            'user_job_id:ntext',
            'user_tag_id',
            'user_shipping_address',
        ],
    ]) ?>

</div>
