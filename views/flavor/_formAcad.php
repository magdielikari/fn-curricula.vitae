<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Academic;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Academics */
/* @var $form yii\widgets\ActiveForm */
?>
<hr>
<div class="academics-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($modelAcad, 'academic_id')->dropDownList(
                ArrayHelper::map(Academic::find()->all(),'id', 'summary'),
                ['prompt'=>'Seleccione un Formación'])  
            ?>
            <div class="form-group">
                <?= Html::submitButton($modelAcad->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $modelAcad->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
        <div class="col-md-8">
            <?php Pjax::begin(); ?> <?= GridView::widget([
                'dataProvider' => $dataAcad,
                'tableOptions' => ['class' => 'table-striped table-condensed'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'academic_id',
                        'label' => Yii::t('app','Titration'),
                        'value' => 'academic.titration',
                    ],
                    [
                        'attribute' => 'academic_id',
                        'label' => Yii::t('app','Reason'),
                        'value' => 'academic.reason',
                    ],
                    [
                        'attribute' => 'academic_id',
                        'label' => Yii::t('app','Institute Name'),
                        'value' => 'academic.institute_name',
                    ],
                    [
                        'attribute' => 'academic_id',
                        'label' => Yii::t('app','Place'),
                        'value' => 'academic.place',
                    ],
                    [
                        'attribute' => 'academic_id',
                        'label' => Yii::t('app','Year'),
                        'value' => 'academic.to',
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
