<?php

namespace app\controllers;

use app\models\PushRecord;
use yii\web\Controller;

class SirusController extends Controller {
    public function actionIndex() {
        $row = PushRecord::find()->all();
        print_r($row);
        echo json_encode($row[0], 1);
    }
}
