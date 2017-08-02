<?php

namespace app\controllers;

use Yii;
use app\models\PushRecord;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PushController implements the CRUD actions for PushRecord model.
 */
class PushController extends Controller {
    public function behaviors() {
        return ['verbs' => ['class' => VerbFilter::className(), 'actions' => ['delete' => ['post'],],],];
    }

    /**
     * Lists all PushRecord models.
     * @return mixed
     */
    public function actionIndex() {
        $dataProvider = new ActiveDataProvider(['query' => PushRecord::find(),]);

        return $this->render('index', ['dataProvider' => $dataProvider,]);
    }

    /**
     * Displays a single PushRecord model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', ['model' => $this->findModel($id),]);
    }

    /**
     * Creates a new PushRecord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new PushRecord();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', ['model' => $model,]);
        }
    }

    /**
     * Updates an existing PushRecord model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', ['model' => $model,]);
        }
    }

    /**
     * Deletes an existing PushRecord model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PushRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PushRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = PushRecord::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /****************** 接口部分 ******************/
    /**
     * 格式化返回值
     * @param $data
     * @param string $msg
     * @param int $code
     */
    protected function respond ($data, $msg = 'success', $code = 200) {
        $resp = array(
            'code' => $code,
            'msg' => $msg,
            'data' => $data ? $data : [],
        );
        $callback = Yii::$app->request->get('callback', '');
        if (empty($callback)) {
            echo json_encode($resp);
        } else {
            echo $callback.'('.json_encode($resp).')';
        }
    }

    public function actionList() {
        $row = PushRecord::find()->asArray()->all();
        $this->respond($row);
    }

    public function actionOne() {
        $model = new PushRecord();
        $param = Yii::$app->request->get();
        // 检查重复
        $model->load($param);

        $row = PushRecord::find()->where([
            'name' => $model->name,
            'guy_name' => $model->guy_name
        ])->asArray()->one();
        unset($row['id']);
        $this->respond($row);
    }

    public function actionAdd() {
        $model = new PushRecord();
        $param = Yii::$app->request->get();
        // 检查重复
        $model->load($param);
        $count = PushRecord::find()->where([
            'name' => $model->name,
            'guy_name' => $model->guy_name
        ])->count();
        if ($count > 0) {
            $this->respond('', '此人已被推荐', 101);
            return;
        }
        // 保存
        if ($model->save()) {
            $this->respond($model);
        } else {
            $this->respond($param, '推荐人手机号重复', 100);
        }
    }

    public function actionDownload () {
        $row = PushRecord::find()->asArray()->all();
        $this->changeToCSV($row);
    }

    public function changeToCSV ($row) {
        $string = '';
        if ($row) {
            // header
            $header = array();
            foreach ($row[0] as $key => $val) {
                array_push($header, $key);
            }
            $string .= implode(",", $header)."\n";
            // body
            foreach ($row as $item) {
                $string .= implode(",", $item)."\n";
            }
            $filename = date('Ymd').'.csv'; //设置文件名
            header("Content-type:text/csv");
            header("Content-Disposition:attachment;filename=".$filename);
            header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
            header('Expires:0');
            header('Pragma:public');
            $string = mb_convert_encoding($string, 'gb2312', 'utf-8');
            echo $string;
        }
    }
}
