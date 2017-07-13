<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Push Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="push-record-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Push Record', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'department',
            'guy_name',
            'guy_phone',
            'guy_email:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
