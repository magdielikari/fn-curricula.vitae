<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Languages */

$this->title = $model->language_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Languages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="languages-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'language_id' => $model->language_id, 'flavor_id' => $model->flavor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'language_id' => $model->language_id, 'flavor_id' => $model->flavor_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'language_id',
            'flavor_id',
            'created_at:datetime',
            [
                'attribute'=>'created_by',
                'value'=>function($dataProvider){
                    return User::findIdentity($dataProvider->created_by)->username;
                },
            ],
            'updated_at:datetime',
            [
                'attribute'=>'updated_by',
                'value'=>function($dataProvider){
                    return User::findIdentity($dataProvider->updated_by)->username;
                },
            ],
        ],
    ]) ?>

</div>
