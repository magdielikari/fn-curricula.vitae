<?php

namespace app\controllers;

use Yii;
use app\models\Experiences;
use app\models\search\ExperiencesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExperiencesController implements the CRUD actions for Experiences model.
 */
class ExperiencesController extends Controller
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
     * Lists all Experiences models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExperiencesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Experiences model.
     * @param string $experience_id
     * @param string $flavor_id
     * @return mixed
     */
    public function actionView($experience_id, $flavor_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($experience_id, $flavor_id),
        ]);
    }

    /**
     * Creates a new Experiences model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Experiences();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'experience_id' => $model->experience_id, 'flavor_id' => $model->flavor_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Experiences model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $experience_id
     * @param string $flavor_id
     * @return mixed
     */
    public function actionUpdate($experience_id, $flavor_id)
    {
        $model = $this->findModel($experience_id, $flavor_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'experience_id' => $model->experience_id, 'flavor_id' => $model->flavor_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Experiences model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $experience_id
     * @param string $flavor_id
     * @return mixed
     */
    public function actionDelete($experience_id, $flavor_id)
    {
        $this->findModel($experience_id, $flavor_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Experiences model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $experience_id
     * @param string $flavor_id
     * @return Experiences the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($experience_id, $flavor_id)
    {
        if (($model = Experiences::findOne(['experience_id' => $experience_id, 'flavor_id' => $flavor_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
