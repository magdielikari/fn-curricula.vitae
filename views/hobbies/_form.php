<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Flavor;
use app\models\Hobby;

/* @var $this yii\web\View */
/* @var $model app\models\Hobbies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hobbies-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'flavor_id')->dropDownList(
                ArrayHelper::map(Flavor::find()->all(),'id', 'name'),
                ['prompt'=>'Seleccione un Sabor'])  
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'hobby_id')->dropDownList(
                ArrayHelper::map(Hobby::find()->all(),'id', 'summary'),
                ['prompt'=>'Seleccione un Interes'])  
            ?>
        </div>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
