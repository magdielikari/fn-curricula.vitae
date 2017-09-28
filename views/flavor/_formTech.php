<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Technology;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Technologies */
/* @var $form yii\widgets\ActiveForm */
?>
<hr>
<div class="technologies-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($modelTech, 'technology_id')->dropDownList(
                ArrayHelper::map(Technology::find()->all(),'id', 'summary'),
                ['prompt'=>'Seleccione una tecnologia'])  
            ?>
            <div class="form-group">
                <?= Html::submitButton($modelTech->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $modelTech->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
        <div class="col-md-8">
            <?php Pjax::begin(); ?> <?= GridView::widget([
                'dataProvider' => $dataTech,
                'tableOptions' => ['class' => 'table-striped table-condensed'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'technology_id',
                        'label' => Yii::t('app','Name'),
                        'value' => 'technology.name',
                    ],
                    
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
