<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Skilles */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Skilles',
]) . $model->flavor_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Skilles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->flavor_id, 'url' => ['view', 'flavor_id' => $model->flavor_id, 'skill_id' => $model->skill_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="skilles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
