<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hobby */

$this->title = Yii::t('app', 'Create Hobby');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hobbies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hobby-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
