<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Flavor;
use app\models\Academic;

/* @var $this yii\web\View */
/* @var $model app\models\Academics */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="academics-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-xs-6">
            <?= $form->field($model, 'academic_id')->dropDownList(
                ArrayHelper::map(Academic::find()->all(),'id', 'summary'),
                ['prompt'=>'Seleccione un Formación'])  
            ?>
        </div>
        <div class="col-xs-6">
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
