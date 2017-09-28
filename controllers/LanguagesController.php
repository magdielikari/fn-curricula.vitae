<?php

namespace app\controllers;

use Yii;
use app\models\Languages;
use app\models\search\LanguagesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LanguagesController implements the CRUD actions for Languages model.
 */
class LanguagesController extends Controller
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
     * Lists all Languages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LanguagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Languages model.
     * @param string $language_id
     * @param string $flavor_id
     * @return mixed
     */
    public function actionView($language_id, $flavor_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($language_id, $flavor_id),
        ]);
    }

    /**
     * Creates a new Languages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Languages();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'language_id' => $model->language_id, 'flavor_id' => $model->flavor_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Languages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $language_id
     * @param string $flavor_id
     * @return mixed
     */
    public function actionUpdate($language_id, $flavor_id)
    {
        $model = $this->findModel($language_id, $flavor_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'language_id' => $model->language_id, 'flavor_id' => $model->flavor_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Languages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $language_id
     * @param string $flavor_id
     * @return mixed
     */
    public function actionDelete($language_id, $flavor_id)
    {
        $this->findModel($language_id, $flavor_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Languages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $language_id
     * @param string $flavor_id
     * @return Languages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($language_id, $flavor_id)
    {
        if (($model = Languages::findOne(['language_id' => $language_id, 'flavor_id' => $flavor_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
