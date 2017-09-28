<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Additional */

$this->title = Yii::t('app', 'Create Additional');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Additionals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="additional-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
