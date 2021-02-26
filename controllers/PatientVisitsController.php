<?php

namespace app\controllers;

use Yii;
use app\models\PatientVisits;
use app\models\PatientVisitsSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PatientVisitsController implements the CRUD actions for PatientVisits model.
 */
class PatientVisitsController extends Controller
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
     * Lists all PatientVisits models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $query =  PatientVisits::find()->where(['patient_id'=>$id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,

        ]);

        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
        ]);
    }

    /**
     * Displays a single PatientVisits model.
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
     * Creates a new PatientVisits model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PatientVisits();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->patient_id=Yii::$app->request->get('id');
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionVisit($id)
    {
        $visits=new PatientVisits();
        $visits->patient_id=$id;
        $visits->status=0;
        $visits->save();

        Yii::$app->session->setFlash('success', "Patient visit is created.");
        return $this->redirect(['index', 'id' => $id]);
    }

    /**
     * Updates an existing PatientVisits model.
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
     * Deletes an existing PatientVisits model.
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
     * Finds the PatientVisits model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PatientVisits the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PatientVisits::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
