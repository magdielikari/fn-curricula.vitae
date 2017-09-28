<?php

namespace app\controllers;

use Yii;
use app\models\Attitudes;
use app\models\search\AttitudesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AttitudesController implements the CRUD actions for Attitudes model.
 */
class AttitudesController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Attitudes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AttitudesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Attitudes model.
     * @param string $attitude_id
     * @param string $flavor_id
     * @return mixed
     */
    public function actionView($attitude_id, $flavor_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($attitude_id, $flavor_id),
        ]);
    }

    /**
     * Creates a new Attitudes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Attitudes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'attitude_id' => $model->attitude_id, 'flavor_id' => $model->flavor_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Attitudes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $attitude_id
     * @param string $flavor_id
     * @return mixed
     */
    public function actionUpdate($attitude_id, $flavor_id)
    {
        $model = $this->findModel($attitude_id, $flavor_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'attitude_id' => $model->attitude_id, 'flavor_id' => $model->flavor_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Attitudes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $attitude_id
     * @param string $flavor_id
     * @return mixed
     */
    public function actionDelete($attitude_id, $flavor_id)
    {
        $this->findModel($attitude_id, $flavor_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Attitudes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $attitude_id
     * @param string $flavor_id
     * @return Attitudes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($attitude_id, $flavor_id)
    {
        if (($model = Attitudes::findOne(['attitude_id' => $attitude_id, 'flavor_id' => $flavor_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
