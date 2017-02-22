<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PushRecord */

$this->title = 'Create Push Record';
$this->params['breadcrumbs'][] = ['label' => 'Push Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="push-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
