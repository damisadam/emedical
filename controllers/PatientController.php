<?php

namespace app\controllers;

use app\models\Medicines;
use app\models\PatientVisits;
use Yii;
use app\models\Patients;
use app\models\PatientsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PatientController implements the CRUD actions for Patients model.
 */
class PatientController extends Controller
{
    public $enableCsrfValidation=false;
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
     * Lists all Patients models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatientsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Patients model.
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
     * Creates a new Patients model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Patients();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $visits=new PatientVisits();
            $visits->patient_id=$model->id;
            $visits->status=0;
            $visits->save();

            Yii::$app->session->setFlash('success', "Patient visit is created.");
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Patients model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Patient record is updated.");
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Patients model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', "Patient record is deleted.");
        return $this->redirect(['index']);
    }

    /**
     * Finds the Patients model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Patients the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Patients::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionSave()
    {
        $data=Yii::$app->request->getRawBody();
        $data=json_decode($data);
        $data=$data->patient;

       // print_r($data);die();
        $model = new Patients();
        $model->name=$data->name;
        $model->so_name=$data->so;
        $model->age=$data->age;
        $model->phone=$data->phone;
        $model->address=$data->address;
        $model->gender=$data->gender;
        if ($model->save()) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return Patients::findOne($model->id);
        }

    }

    public function actionMedi()
    {
        $data=Yii::$app->request->getRawBody();
        $data=json_decode($data);
        $data=$data->medicine;

       // print_r($data);die();
        $model = new Medicines();
        $model->name=$data->name;
        $model->detail=$data->detail;
        if ($model->save()) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return Medicines::findOne($model->id);
        }

    }
}
