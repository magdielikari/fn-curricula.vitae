<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Attitude */

$this->title = Yii::t('app', 'Create Attitude');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Attitudes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attitude-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
