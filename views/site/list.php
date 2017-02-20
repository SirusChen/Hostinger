<?php
use \yii\grid\GridView;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'label' => 'ID',
            'value' => 'id'
        ], [
            'label' => '姓名',
            'value' => 'name'
        ], [
            'label' => '部门',
            'value' => 'department'
        ], [
            'label' => '推荐人姓名',
            'value' => 'guy_name'
        ], [
            'label' => '推荐人电话',
            'value' => 'guy_phone'
        ], [
            'label' => '推荐人邮箱',
            'value' => 'guy_email'
        ],
    ],
]);