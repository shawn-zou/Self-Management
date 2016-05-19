<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = Yii::t('lang', 'Create User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('lang', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
