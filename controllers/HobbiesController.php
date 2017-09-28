<?php

namespace app\controllers;

use Yii;
use app\models\Hobbies;
use app\models\search\HobbiesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HobbiesController implements the CRUD actions for Hobbies model.
 */
class HobbiesController extends Controller
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
     * Lists all Hobbies models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HobbiesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hobbies model.
     * @param string $flavor_id
     * @param string $hobby_id
     * @return mixed
     */
    public function actionView($flavor_id, $hobby_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($flavor_id, $hobby_id),
        ]);
    }

    /**
     * Creates a new Hobbies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hobbies();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'flavor_id' => $model->flavor_id, 'hobby_id' => $model->hobby_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Hobbies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $flavor_id
     * @param string $hobby_id
     * @return mixed
     */
    public function actionUpdate($flavor_id, $hobby_id)
    {
        $model = $this->findModel($flavor_id, $hobby_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'flavor_id' => $model->flavor_id, 'hobby_id' => $model->hobby_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Hobbies model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $flavor_id
     * @param string $hobby_id
     * @return mixed
     */
    public function actionDelete($flavor_id, $hobby_id)
    {
        $this->findModel($flavor_id, $hobby_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Hobbies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $flavor_id
     * @param string $hobby_id
     * @return Hobbies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($flavor_id, $hobby_id)
    {
        if (($model = Hobbies::findOne(['flavor_id' => $flavor_id, 'hobby_id' => $hobby_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
