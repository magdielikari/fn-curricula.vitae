<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Attitude;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Attitudes */
/* @var $form yii\widgets\ActiveForm */
?>
<hr>
<div class="attitudes-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($modelAtti, 'attitude_id')->dropDownList(
                ArrayHelper::map(Attitude::find()->all(),'id', 'summary'),
                ['prompt'=>'Seleccione una Actitud'])  
            ?>
            <div class="form-group">
                <?= Html::submitButton($modelAtti->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $modelAtti->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
        <div class="col-md-8">
            <?php Pjax::begin(); ?> <?= GridView::widget([
                'dataProvider' => $dataAtti,
                'tableOptions' => ['class' => 'table-striped table-condensed'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'attitude_id',
                        'label' => Yii::t('app','Name'),
                        'value' => 'attitude.name',
                    ],
                    [
                        'attribute' => 'attitude_id',
                        'label' => Yii::t('app','Reason'),
                        'value' => 'attitude.reason',
                    ],
                    [
                        'attribute' => 'attitude_id',
                        'label' => Yii::t('app','Order'),
                        'value' => 'attitude.order',
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
            <?php Pjax::end(); ?>       
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
