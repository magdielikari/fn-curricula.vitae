<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Flavor */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Flavors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flavor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
            'id',
            'name',
            'profession',
            'contact_id',
            'additional_id',
            'stylesheets_id',
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
        ]
    ]) ?>

</div>
