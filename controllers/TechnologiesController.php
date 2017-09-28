<?php

namespace app\controllers;

use Yii;
use app\models\Technologies;
use app\models\search\TechnologiesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TechnologiesController implements the CRUD actions for Technologies model.
 */
class TechnologiesController extends Controller
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
     * Lists all Technologies models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TechnologiesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Technologies model.
     * @param string $flavor_id
     * @param string $technology_id
     * @return mixed
     */
    public function actionView($flavor_id, $technology_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($flavor_id, $technology_id),
        ]);
    }

    /**
     * Creates a new Technologies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Technologies();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'flavor_id' => $model->flavor_id, 'technology_id' => $model->technology_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Technologies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $flavor_id
     * @param string $technology_id
     * @return mixed
     */
    public function actionUpdate($flavor_id, $technology_id)
    {
        $model = $this->findModel($flavor_id, $technology_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'flavor_id' => $model->flavor_id, 'technology_id' => $model->technology_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Technologies model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $flavor_id
     * @param string $technology_id
     * @return mixed
     */
    public function actionDelete($flavor_id, $technology_id)
    {
        $this->findModel($flavor_id, $technology_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Technologies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $flavor_id
     * @param string $technology_id
     * @return Technologies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($flavor_id, $technology_id)
    {
        if (($model = Technologies::findOne(['flavor_id' => $flavor_id, 'technology_id' => $technology_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
