<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Technologies */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Technologies',
]) . $model->flavor_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Technologies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->flavor_id, 'url' => ['view', 'flavor_id' => $model->flavor_id, 'technology_id' => $model->technology_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="technologies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
