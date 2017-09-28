<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hobbies */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Hobbies',
]) . $model->flavor_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hobbies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->flavor_id, 'url' => ['view', 'flavor_id' => $model->flavor_id, 'hobby_id' => $model->hobby_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="hobbies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
