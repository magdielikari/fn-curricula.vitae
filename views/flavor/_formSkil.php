<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Skill;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Skilles */
/* @var $form yii\widgets\ActiveForm */
?>
<hr>
<div class="skilles-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($modelSkil, 'skill_id')->dropDownList(
                ArrayHelper::map(Skill::find()->all(),'id', 'summary'),
                ['prompt'=>'Seleccione un Aptitud'])  
            ?>        
            <div class="form-group">
                <?= Html::submitButton($modelSkil->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $modelSkil->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
        <div class="col-md-8">
            <?php Pjax::begin(); ?> <?= GridView::widget([
                'dataProvider' => $dataSkil,
                'tableOptions' => ['class' => 'table-striped table-condensed'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'skill_id',
                        'label' => Yii::t('app','Name'),
                        'value' => 'skill.name',
                    ],
                    [
                        'attribute' => 'skill_id',
                        'label' => Yii::t('app','Reason'),
                        'value' => 'skill.reason',
                    ],
                    [
                        'attribute' => 'skill_id',
                        'label' => Yii::t('app','Order'),
                        'value' => 'skill.order',
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>         

    <?php ActiveForm::end(); ?>

</div>
