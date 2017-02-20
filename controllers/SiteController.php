<?php

namespace app\controllers;

use app\models\PushRecord;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class SiteController extends Controller {
    public $layout = "main";

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionList() {
        $query = PushRecord::find();
        $data = new ActiveDataProvider([
            'query' => $query
        ]);
        return $this->render('list', [
            'dataProvider' => $data
        ]);
    }

    public function actionAdd() {
        $row = PushRecord::find()->all();
        print_r($row[0]->id);
    }
}
