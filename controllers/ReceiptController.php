<?php

namespace app\controllers;

use app\models\Doctors;
use app\models\ReceiptMedicine;
use kartik\mpdf\Pdf;
use Yii;
use app\models\Receipts;
use app\models\ReceiptsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReceiptController implements the CRUD actions for Receipts model.
 */
class ReceiptController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Receipts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReceiptsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Receipts model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Receipts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //echo "<pre>";
        $model = new Receipts();
        $model->doctor_id=Receipts::find()->one()->id;
        if(Yii::$app->request->isPost){
            $data=Yii::$app->request->post();
           /* print_r($data['pluse']);
            die();*/

            $detail='Pulse:'.$data['pluse'];
            $detail.=',Temp:'.$data['temp'];
            $detail.=',R/R:'.$data['rr'];
            $detail.=',BP:'.$data['BP'];
            $detail.=',Weight:'.$data['weight'];
            $detail.=',Height:'.$data['height'];
            $detail.=',BMI:'.$data['bmi'];
            $model->body_deail=$detail;


            print_r(Yii::$app->request->post());
            //die();
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            foreach ($data['medi'] as $key=>$value){
               $medi=new ReceiptMedicine();
                $medi->receipt_id=$model->id;
                $medi->medicine_id=$id=$value;
                $medi->morning= $morning=$data['morning'][$key];
                $medi->afternoon= $afternoon=$data['afternoon'][$key];
                $medi->evening=  $evening=$data['evening'][$key];
                $medi->save();

            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Receipts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Receipts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Receipts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Receipts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Receipts::findOne($id)) !== null) {
           /* echo "<pre>";
            print_r($model->mediciness);
            die();*/
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



    public function actionReport($id) {
        $model  = $this->findModel($id);
        // get your HTML raw content without any layouts or scripts
        //return$this->render('_reportView');
       /*  echo "<pre>";
            print_r($model->patient);
            die();*/
        $content = $this->renderPartial('_reportView',['model'=>$model]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            'marginTop' => 15    ,
            'marginBottom' => 0    ,
            'marginLeft' => 5    ,
            'marginRight' => 5    ,
            //'defaultFontSize' => 20   ,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' =>'.tabless {
  border: 1px solid gray;
}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Krajee Report Title'],
            // call mPDF methods on the fly
            'methods' => [
                //'SetHeader'=>['Krajee Report Header'],
                'SetFooter'=>['Date:'.$model->created_at],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

}
