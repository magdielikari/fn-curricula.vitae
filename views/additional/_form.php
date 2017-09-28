<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Additional */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="additional-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>    
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'personal_web')->textInput(['maxlength' => true]) ?>    
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'linkedIn')->textInput(['maxlength' => true]) ?>            
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'pinterest')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'github')->textInput(['maxlength' => true]) ?>            
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'bitbucket')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'twitter')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'codePen')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'gitlab')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'other')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
