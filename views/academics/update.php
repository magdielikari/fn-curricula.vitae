<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Academics */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Academics',
]) . $model->academic_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Academics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->academic_id, 'url' => ['view', 'academic_id' => $model->academic_id, 'flavor_id' => $model->flavor_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="academics-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
