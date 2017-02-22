<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PushRecord */

$this->title = 'Update Push Record: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Push Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="push-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
