<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Language;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Languages */
/* @var $form yii\widgets\ActiveForm */
?>
<hr>
<div class="languages-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($modelLang, 'language_id')->dropDownList(
                ArrayHelper::map(Language::find()->all(),'id', 'summary'),
                ['prompt'=>'Seleccione un Idioma'])  
            ?>
            <div class="form-group">
                <?= Html::submitButton($modelLang->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $modelLang->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
        <div class="col-md-8">
            <?php Pjax::begin(); ?> <?= GridView::widget([
                'dataProvider' => $dataLang,
                'tableOptions' => ['class' => 'table-striped table-condensed'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'language_id',
                        'label' => Yii::t('app','Language Name'),
                        'value' => 'language.name',
                    ],
                    [
                        'attribute' => 'language_id',
                        'label' => Yii::t('app','Score'),
                        'value' => 'language.score',
                    ],
                    [
                        'attribute' => 'language_id',
                        'label' => Yii::t('app','Level'),
                        'value' => 'language.level',
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
