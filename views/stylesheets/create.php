<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Stylesheets */

$this->title = Yii::t('app', 'Create Stylesheets');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stylesheets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stylesheets-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
