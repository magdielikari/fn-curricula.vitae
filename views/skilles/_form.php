<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Flavor;
use app\models\Skill;

/* @var $this yii\web\View */
/* @var $model app\models\Skilles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="skilles-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'flavor_id')->dropDownList(
                ArrayHelper::map(Flavor::find()->all(),'id', 'name'),
                ['prompt'=>'Seleccione un Sabor'])  
            ?>        
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'skill_id')->dropDownList(
                ArrayHelper::map(Skill::find()->all(),'id', 'summary'),
                ['prompt'=>'Seleccione un Aptitud'])  
            ?>        
        </div>
    </div>         

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
