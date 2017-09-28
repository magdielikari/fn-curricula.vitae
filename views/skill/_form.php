<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Skill */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="skill-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-5">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>           
        </div>
        <div class="col-md-5">
            <?= $form->field($model, 'reason')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'score')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'level')->dropDownList([ 'A1' => 'A1', 'A2' => 'A2', 'B1' => 'B1', 'B2' => 'B2', 'C1' => 'C1', 'C2' => 'C2', ], ['prompt' => '']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'logo_id')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
