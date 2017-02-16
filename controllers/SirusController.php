<?php

namespace app\controllers;

use app\models\PushRecord;
use yii\web\Controller;

class SirusController extends Controller {
    public function actionIndex() {
        echo "你好吗啊？";
        $row = PushRecord::find()->all();
        print_r($row);
    }
}
