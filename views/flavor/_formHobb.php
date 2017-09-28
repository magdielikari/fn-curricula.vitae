<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Hobby;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Hobbies */
/* @var $form yii\widgets\ActiveForm */
?>
<hr>
<div class="hobbies-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($modelHobb, 'hobby_id')->dropDownList(
                ArrayHelper::map(Hobby::find()->all(),'id', 'summary'),
                ['prompt'=>'Seleccione un Interes'])  
            ?>
            <div class="form-group">
                <?= Html::submitButton($modelHobb->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $modelHobb->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
        <div class="col-md-8">
            <?php Pjax::begin(); ?> <?= GridView::widget([
                'dataProvider' => $dataHobb,
                'tableOptions' => ['class' => 'table-striped table-condensed'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'hobby_id',
                        'label' => Yii::t('app','Hobby Name'),
                        'value' => 'hobby.name',
                    ],
                    [
                        'attribute' => 'hobby_id',
                        'label' => Yii::t('app','Score'),
                        'value' => 'hobby.score',
                    ],
                    [
                        'attribute' => 'hobby_id',
                        'label' => Yii::t('app','Color'),
                        'value' => 'hobby.color',
                    ],


                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
