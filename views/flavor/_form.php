<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Contact;
use app\models\Additional;
use app\models\Stylesheets;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Flavor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="flavor-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-5">
            <?= DetailView::widget([
            'model' => $mCon,
            'attributes' => [
                'shortName',
                'phone',
                'dni',
                'birth',
                'email:email',
                'address',
                'location',
                ],
            ]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'profession')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'contact_id')->dropDownList(
                ArrayHelper::map(Contact::find()->all(),'id', 'shortName'),
                ['prompt'=>'Seleccione un Contacto'])  
            ?>            
            <?= $form->field($model, 'additional_id')->dropDownList(
                ArrayHelper::map(Additional::find()->all(),'id', 'name'),
                ['prompt'=>'Seleccione una información adicional'])  
            ?>
            <?= $form->field($model, 'stylesheets_id')->dropDownList(
                ArrayHelper::map(Stylesheets::find()->all(),'id', 'name'),
                ['prompt'=>'Seleccione una '])  
            ?>
        </div>
        <div class="col-md-4">
            <?= DetailView::widget([
                'model' => $mAdd,
                'attributes' => [
                    'name',
                    'description',
                ],
            ]) ?>
        </div>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
