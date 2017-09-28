<?php

namespace app\controllers;

use Yii;
use app\models\Flavor;
use app\models\search\FlavorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Experiences;
use app\models\Academics;
use app\models\Technologies;
use app\models\Hobbies;
use app\models\Skilles;
use app\models\Attitudes;
use app\models\Languages;
use app\models\search\ExperiencesSearch;
use app\models\search\AcademicsSearch;
use app\models\search\TechnologiesSearch;
use app\models\search\HobbiesSearch;
use app\models\search\SkillesSearch;
use app\models\search\AttitudesSearch;
use app\models\search\LanguagesSearch;

/**
 * FlavorController implements the CRUD actions for Flavor model.
 */
class FlavorController extends Controller
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
     * Lists all Flavor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FlavorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Flavor model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

   /**
     * Displays a single Flavor model.
     * @param string $id
     * @return mixed
     */
    public function actionProof($id)
    { 
        $this->layout = 'cv';
        return $this->render('libertad', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Flavor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Flavor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     *
     */
    protected function boostrapSearch(){
        $searchExpe = new ExperiencesSearch();
        $searchAcad = new AcademicsSearch();
        $searchTech = new TechnologiesSearch();
        $searchHobb = new HobbiesSearch();
        $searchSkil = new SkillesSearch();
        $searchAtti = new AttitudesSearch();
        $searchLang = new LanguagesSearch();
        
        return [$searchAcad, $searchAtti, $searchExpe, 
        $searchHobb, $searchLang, $searchTech, $searchSkil];
    }


    /**
     *
     */
    protected function modelData($search, $id, $n){
        if($n === 0){
            $model = new Academics();
            $q = [
                'AcademicsSearch' => [ 
                    'flavor_id' => $id
                ]
            ];
            $data = $search->search($q);
        } elseif($n == 1){
            $model = new Attitudes();
            $q = [
                'AttitudesSearch' => [ 
                    'flavor_id' => $id
                ]
            ];
            $data = $search->search($q);
        } elseif($n == 2){
            $model = new Experiences();
            $q = [
                'ExperiencesSearch' => [ 
                    'flavor_id' => $id
                ]
            ];
            $data = $search->search($q);        
        } elseif($n == 3){
            $model = new Hobbies();
            $q = [
                'HobbiesSearch' => [ 
                    'flavor_id' => $id
                ]
            ];
            $data = $search->search($q);
        } elseif($n == 4){
            $model = new Languages();
            $q = [
                'LanguagesSearch' => [ 
                    'flavor_id' => $id
                ]
            ];
            $data = $search->search($q);
        } elseif($n == 5){
            $model = new Technologies();
            $q = [
                'TechnologiesSearch' => [ 
                    'flavor_id' => $id
                ]
            ];
            $data = $search->search($q);          
        } elseif($n == 6){
            $model = new Skilles();
            $q = [
                'SkillesSearch' => [ 
                    'flavor_id' => $id
                ]
            ];
            $data = $search->search($q);
        } else{
            throw new NotFoundHttpException('Not opcion value');
        }
        return [$model, $data];
    }

    /**
     * Updates an existing Flavor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $mCon = $model->contact;
        $mAdd = $model->additional;
        $searchs = $this->boostrapSearch();
        for ($i=0; $i < 7; $i++) { 
            $value = $this->modelData($searchs[$i], $id, $i);
            $models[$i] = $value[0];
            $datas[$i] = $value[1];
        }
 
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } elseif ($models[0]->load(Yii::$app->request->post())) {
            $models[0]->flavor_id = $id;
            $models[0]->save();
            $value = $this->modelData($searchs[0], $id, 0);
            $models[0] = $value[0];
            $datas[0] = $value[1];
            return $this->render('update', [
                'mCon' => $mCon,
                'mAdd' => $mAdd,
                'model' => $model,
                'datas' => $datas,
                'models' => $models,
            ]);
        } elseif ($models[1]->load(Yii::$app->request->post())) {
            $models[1]->flavor_id = $id;
            $models[1]->save();
            $value = $this->modelData($searchs[1], $id, 1);
            $models[1] = $value[0];
            $datas[1] = $value[1];
            return $this->render('update', [
                'mCon' => $mCon,
                'mAdd' => $mAdd,
                'model' => $model,
                'datas' => $datas,
                'models' => $models,
            ]);
        } elseif ($models[2]->load(Yii::$app->request->post())) {
            $models[2]->flavor_id = $id;
            $models[2]->save();
            $value = $this->modelData($searchs[2], $id, 2);
            $models[2] = $value[0];
            $datas[2] = $value[1];
            return $this->render('update', [
                'mCon' => $mCon,
                'mAdd' => $mAdd,
                'model' => $model,
                'datas' => $datas,
                'models' => $models,
            ]);
        } elseif ($models[3]->load(Yii::$app->request->post())) {
            $models[3]->flavor_id = $id;
            $models[3]->save();
            $value = $this->modelData($searchs[3], $id, 3);
            $models[3] = $value[0];
            $datas[3] = $value[1];
            return $this->render('update', [
                'mCon' => $mCon,
                'mAdd' => $mAdd,
                'model' => $model,
                'datas' => $datas,
                'models' => $models,
            ]);
        } elseif ($models[4]->load(Yii::$app->request->post())) {
            $models[4]->flavor_id = $id;
            $models[4]->save();
            $value = $this->modelData($searchs[4], $id, 4);
            $models[4] = $value[0];
            $datas[4] = $value[1];
            return $this->render('update', [
                'mCon' => $mCon,
                'mAdd' => $mAdd,
                'model' => $model,
                'datas' => $datas,
                'models' => $models,
            ]);
        } elseif ($models[5]->load(Yii::$app->request->post())) {
            $models[5]->flavor_id = $id;
            $models[5]->save();
            $value = $this->modelData($searchs[5], $id, 5);
            $models[5] = $value[0];
            $datas[5] = $value[1];
            return $this->render('update', [
                'mCon' => $mCon,
                'mAdd' => $mAdd,
                'model' => $model,
                'datas' => $datas,
                'models' => $models,
            ]);
        } elseif ($models[6]->load(Yii::$app->request->post())) {
            $models[6]->flavor_id = $id;
            $models[6]->save();
            $value = $this->modelData($searchs[6], $id, 6);
            $models[6] = $value[0];
            $datas[6] = $value[1];
            return $this->render('update', [
                'mCon' => $mCon,
                'mAdd' => $mAdd,
                'model' => $model,
                'datas' => $datas,
                'models' => $models,
            ]);
        } else {
            return $this->render('update', [
                'mCon' => $mCon,
                'mAdd' => $mAdd,
                'datas' => $datas,
                'model' => $model,
                'models' => $models,
            ]);
        }
    }

    /**
     * Deletes an existing Flavor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Flavor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Flavor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Flavor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
