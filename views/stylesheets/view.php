<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Stylesheets */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stylesheets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stylesheets-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'full_name_contact_tag',
            'full_name_contact_style',
            'short_name_contact_tag',
            'short_name_contact_style',
            'medium_name_contact_tag',
            'medium_name_contact_style',
            'profession_flavor_tag',
            'profession_flavor_style',
            'contact_additional_tag',
            'contact_additional_style',
            'photo_contact_style',
            'icon_phone_contact_style',
            'icon_dni_contact_style',
            'icon_birth_contact_style',
            'icon_email_contact_style:email',
            'icon_address_contact_style',
            'icon_location_contact_style',
            'description_additional_style',
            'icon_phone_additional_style',
            'icon_github_additional_style',
            'icon_gitlab_additional_style',
            'icon_bitbucket_additional_style',
            'icon_linkedIn_additional_style',
            'icon_twitter_additional_style',
            'icon_codePen_additional_style',
            'icon_pinterest_additional_style',
            'icon_other_additional_style',
            'icon_personal_web_additional_style',
            'icon_description_additional_style',
            'experience_tag',
            'experience_style',
            'icon_experience_style',
            'academic_tag',
            'academic_style',
            'icon_academic_style',
            'technology_tag',
            'technology_style',
            'icon_technology_style',
            'svg_technology_style',
            'hobby_tag',
            'hobby_style',
            'icon_hobby_style',
            'svg_hobby_style',
            'skill_tag',
            'skill_style',
            'icon_skill_style',
            'svg_skill_style',
            'lenguage_tag',
            'lenguage_style',
            'icon_lenguage_style',
            'svg_languages_style',
            'attitude_tag',
            'attitude_style',
            'icon_attitude_style',
            'svg_attitude_style',
            'background_first',
            'background_second',
            'created_at:datetime',
            [
                'attribute'=>'created_by',
                'value'=>function($dataProvider){
                    return User::findIdentity($dataProvider->created_by)->username;
                },
            ],
            'updated_at:datetime',
            [
                'attribute'=>'updated_by',
                'value'=>function($dataProvider){
                    return User::findIdentity($dataProvider->updated_by)->username;
                },
            ],
        ],
    ]) ?>

</div>
