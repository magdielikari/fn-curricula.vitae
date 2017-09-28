<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Attitudes */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Attitudes',
]) . $model->attitude_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Attitudes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->attitude_id, 'url' => ['view', 'attitude_id' => $model->attitude_id, 'flavor_id' => $model->flavor_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="attitudes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
