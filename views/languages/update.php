<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Languages */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Languages',
]) . $model->language_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Languages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->language_id, 'url' => ['view', 'language_id' => $model->language_id, 'flavor_id' => $model->flavor_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="languages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
