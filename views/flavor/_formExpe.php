<?php

use Yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Experience;
use yii\widgets\Pjax;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Experiences */
/* @var $form yii\widgets\ActiveForm */
?>
<hr>
<div class="experiences-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($modelExpe, 'experience_id')->dropDownList(
                ArrayHelper::map(Experience::find()->all(),'id','summary'),
                ['prompt'=>'Seleccione una Experiencia Laboral'])  
            ?>
            <div class="form-group">
                <?= Html::submitButton($modelExpe->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $modelExpe->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
        <div class="col-md-8">
            <?php Pjax::begin(); ?> <?= GridView::widget([
                'dataProvider' => $dataExpe,
                'tableOptions' => ['class' => 'table-striped table-condensed'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'experience_id',
                        'label' => Yii::t('app','Charged Down'),
                        'value' => 'experience.charged_down',
                    ],
                    [
                        'attribute' => 'experience_id',
                        'label' => Yii::t('app','Company Name'),
                        'value' => 'experience.company_name',
                    ],
                    [
                        'attribute' => 'experience_id',
                        'label' => Yii::t('app','Description'),
                        'value' => function($dataExpe){
                            return Yii::$app->formatter->asHtml($dataExpe->experience->description);
                        } 
                    ],
                    [
                        'attribute' => 'experience_id',
                        'label' => Yii::t('app','Durations'),
                        'value' => function($dataExpe){
                            return Yii::$app->formatter->asDuration($dataExpe->experience->duration);
                        }
                    ],


                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
