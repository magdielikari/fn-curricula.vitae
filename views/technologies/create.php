<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Technologies */

$this->title = Yii::t('app', 'Create Technologies');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Technologies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="technologies-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
