<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Academic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="academic-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">
		<div class="col-md-6">
		    <?= $form->field($model, 'institute_name')->textInput(['maxlength' => true]) ?>		
		</div>
		<div class="col-md-6">
		    <?= $form->field($model, 'titration')->textInput(['maxlength' => true]) ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-5">
		    <?= $form->field($model, 'place')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-md-3">
			<?= $form->field($model, 'reason')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-md-2">
    		<?= $form->field($model, 'duration')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-md-1">
			<?= $form->field($model, 'from')->textInput() ?>
		</div>
		<div class="col-md-1">
    		<?= $form->field($model, 'to')->textInput() ?>
		</div>
	</div>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
