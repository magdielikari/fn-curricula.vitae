<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Academics */

$this->title = Yii::t('app', 'Create Academics');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Academics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academics-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
