<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\StylesheetsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stylesheets-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'full_name_contact_tag') ?>

    <?= $form->field($model, 'full_name_contact_style') ?>

    <?= $form->field($model, 'short_name_contact_tag') ?>

    <?php // echo $form->field($model, 'short_name_contact_style') ?>

    <?php // echo $form->field($model, 'medium_name_contact_tag') ?>

    <?php // echo $form->field($model, 'medium_name_contact_style') ?>

    <?php // echo $form->field($model, 'profession_flavor_tag') ?>

    <?php // echo $form->field($model, 'profession_flavor_style') ?>

    <?php // echo $form->field($model, 'contact_additional_tag') ?>

    <?php // echo $form->field($model, 'contact_additional_style') ?>

    <?php // echo $form->field($model, 'photo_contact_style') ?>

    <?php // echo $form->field($model, 'icon_phone_contact_style') ?>

    <?php // echo $form->field($model, 'icon_dni_contact_style') ?>

    <?php // echo $form->field($model, 'icon_birth_contact_style') ?>

    <?php // echo $form->field($model, 'icon_email_contact_style') ?>

    <?php // echo $form->field($model, 'icon_address_contact_style') ?>

    <?php // echo $form->field($model, 'icon_location_contact_style') ?>

    <?php // echo $form->field($model, 'description_additional_style') ?>

    <?php // echo $form->field($model, 'icon_phone_additional_style') ?>

    <?php // echo $form->field($model, 'icon_github_additional_style') ?>

    <?php // echo $form->field($model, 'icon_gitlab_additional_style') ?>

    <?php // echo $form->field($model, 'icon_bitbucket_additional_style') ?>

    <?php // echo $form->field($model, 'icon_linkedIn_additional_style') ?>

    <?php // echo $form->field($model, 'icon_twitter_additional_style') ?>

    <?php // echo $form->field($model, 'icon_codePen_additional_style') ?>

    <?php // echo $form->field($model, 'icon_pinterest_additional_style') ?>

    <?php // echo $form->field($model, 'icon_other_additional_style') ?>

    <?php // echo $form->field($model, 'icon_personal_web_additional_style') ?>

    <?php // echo $form->field($model, 'icon_description_additional_style') ?>

    <?php // echo $form->field($model, 'experience_tag') ?>

    <?php // echo $form->field($model, 'experience_style') ?>

    <?php // echo $form->field($model, 'icon_experience_style') ?>

    <?php // echo $form->field($model, 'item_experience_style') ?>

    <?php // echo $form->field($model, 'academic_tag') ?>

    <?php // echo $form->field($model, 'academic_style') ?>

    <?php // echo $form->field($model, 'icon_academic_style') ?>

    <?php // echo $form->field($model, 'item_academic_style') ?>

    <?php // echo $form->field($model, 'technology_tag') ?>

    <?php // echo $form->field($model, 'technology_style') ?>

    <?php // echo $form->field($model, 'icon_technology_style') ?>

    <?php // echo $form->field($model, 'svg_technology_style') ?>

    <?php // echo $form->field($model, 'hobby_tag') ?>

    <?php // echo $form->field($model, 'hobby_style') ?>

    <?php // echo $form->field($model, 'icon_hobby_style') ?>

    <?php // echo $form->field($model, 'svg_hobby_style') ?>

    <?php // echo $form->field($model, 'skill_tag') ?>

    <?php // echo $form->field($model, 'skill_style') ?>

    <?php // echo $form->field($model, 'icon_skill_style') ?>

    <?php // echo $form->field($model, 'svg_skill_style') ?>

    <?php // echo $form->field($model, 'lenguage_tag') ?>

    <?php // echo $form->field($model, 'lenguage_style') ?>

    <?php // echo $form->field($model, 'icon_lenguage_style') ?>

    <?php // echo $form->field($model, 'svg_languages_style') ?>

    <?php // echo $form->field($model, 'attitude_tag') ?>

    <?php // echo $form->field($model, 'attitude_style') ?>

    <?php // echo $form->field($model, 'icon_attitude_style') ?>

    <?php // echo $form->field($model, 'svg_attitude_style') ?>

    <?php // echo $form->field($model, 'background_first') ?>

    <?php // echo $form->field($model, 'background_second') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
