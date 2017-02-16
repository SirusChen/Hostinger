<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SirusController extends Controller {
    public function actionIndex() {
        echo "你好吗啊？";
    }
}
