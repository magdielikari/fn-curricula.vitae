<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hobbies */

$this->title = Yii::t('app', 'Create Hobbies');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hobbies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hobbies-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
