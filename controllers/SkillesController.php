<?php

namespace app\controllers;

use Yii;
use app\models\Skilles;
use app\models\search\SkillesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SkillesController implements the CRUD actions for Skilles model.
 */
class SkillesController extends Controller
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
     * Lists all Skilles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SkillesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Skilles model.
     * @param string $flavor_id
     * @param string $skill_id
     * @return mixed
     */
    public function actionView($flavor_id, $skill_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($flavor_id, $skill_id),
        ]);
    }

    /**
     * Creates a new Skilles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Skilles();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'flavor_id' => $model->flavor_id, 'skill_id' => $model->skill_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Skilles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $flavor_id
     * @param string $skill_id
     * @return mixed
     */
    public function actionUpdate($flavor_id, $skill_id)
    {
        $model = $this->findModel($flavor_id, $skill_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'flavor_id' => $model->flavor_id, 'skill_id' => $model->skill_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Skilles model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $flavor_id
     * @param string $skill_id
     * @return mixed
     */
    public function actionDelete($flavor_id, $skill_id)
    {
        $this->findModel($flavor_id, $skill_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Skilles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $flavor_id
     * @param string $skill_id
     * @return Skilles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($flavor_id, $skill_id)
    {
        if (($model = Skilles::findOne(['flavor_id' => $flavor_id, 'skill_id' => $skill_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
