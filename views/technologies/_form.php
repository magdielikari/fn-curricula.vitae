<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Flavor;
use app\models\Technology;

/* @var $this yii\web\View */
/* @var $model app\models\Technologies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="technologies-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'flavor_id')->dropDownList(
                ArrayHelper::map(Flavor::find()->all(),'id', 'name'),
                ['prompt'=>'Seleccione un sabor'])  
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'technology_id')->dropDownList(
                ArrayHelper::map(Technology::find()->all(),'id', 'summary'),
                ['prompt'=>'Seleccione una tecnologia'])  
            ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
