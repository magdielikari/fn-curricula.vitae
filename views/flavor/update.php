<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Flavor */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Flavor',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Flavors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="flavor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mCon' => $mCon,
        'mAdd' => $mAdd,
    ]) ?>

    <?= $this->render('_formAcad', [
        'modelAcad' => $models[0],
        'dataAcad' => $datas[0],
    ]) ?>

    <?= $this->render('_formAtti', [
        'modelAtti' => $models[1],
        'dataAtti' => $datas[1],
    ]) ?>

    <?= $this->render('_formExpe', [
        'modelExpe' => $models[2],
        'dataExpe' => $datas[2],
    ]) ?>

    <?= $this->render('_formHobb', [
        'modelHobb' => $models[3],
        'dataHobb' => $datas[3],
    ]) ?>

    <?= $this->render('_formLang', [
        'modelLang' => $models[4],
        'dataLang' => $datas[4],
    ]) ?>

    <?= $this->render('_formTech', [
        'modelTech' => $models[5],
        'dataTech' => $datas[5],
    ]) ?>

    <?= $this->render('_formSkil', [
        'modelSkil' => $models[6],
        'dataSkil' => $datas[6],
    ]) ?>

</div>

