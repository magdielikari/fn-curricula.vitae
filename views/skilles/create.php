<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Skilles */

$this->title = Yii::t('app', 'Create Skilles');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Skilles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skilles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
