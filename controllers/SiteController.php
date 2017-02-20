<?php

namespace app\controllers;

use app\models\PushRecord;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class SiteController extends Controller {
    public function actionList() {
        $query = PushRecord::find();
        $data = new ActiveDataProvider([
            'query' => $query
        ]);
        return $this->render('list', [
            'dataProvider' => $data
        ]);
    }
}
