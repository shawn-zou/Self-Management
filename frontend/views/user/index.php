<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_name',
            'user_pwd',
            'salt',
            'user_pwd_hash',
            // 'user_email:email',
            // 'email_code:email',
            // 'user_email_status:email',
            // 'user_phonenum',
            // 'user_phone_status',
            // 'is_status',
            // 'user_nickname',
            // 'user_realname',
            // 'user_sex',
            // 'user_location',
            // 'user_emotional_state',
            // 'user_birthday',
            // 'user_blood_type',
            // 'user_introduction:ntext',
            // 'user_qq',
            // 'user_img',
            // 'user_creatime:datetime',
            // 'user_updatime:datetime',
            // 'login_ip',
            // 'login_time:datetime',
            // 'is_delete',
            // 'user_education_id:ntext',
            // 'user_job_id:ntext',
            // 'user_tag_id',
            // 'user_shipping_address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
