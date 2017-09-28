<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Flavor;
use app\models\Attitude;

/* @var $this yii\web\View */
/* @var $model app\models\Attitudes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attitudes-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'attitude_id')->dropDownList(
                ArrayHelper::map(Attitude::find()->all(),'id', 'summary'),
                ['prompt'=>'Seleccione una Actitud'])  
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'flavor_id')->dropDownList(
                ArrayHelper::map(Flavor::find()->all(),'id', 'name'),
                ['prompt'=>'Seleccione un Sabor'])  
            ?>           
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
