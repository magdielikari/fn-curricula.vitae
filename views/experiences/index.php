<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ExperiencesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Experiences');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="experiences-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Experiences'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'experience_id',
            [
                'attribute' => 'experience_id',
                'label' => Yii::t('app','Experience Name'),
                'value' => 'experience.charged_down',
            ],
            [
                'attribute' => 'experience_id',
                'label' => Yii::t('app','Experience Name'),
                'value' => 'experience.company_name',
            ],
            [
                'attribute' => 'flavor_id',
                'label' => Yii::t('app', 'Flavor Name'),
                'value' => 'flavor.name',
            ],
            [
                'attribute' => 'flavor_id',
                'label' => Yii::t('app', 'Flavor Profession'),
                'value' => 'flavor.profession',
            ],
            [
                'attribute' => 'flavor_id',
                'label' => Yii::t('app','Contact Name Short'),
                'value' => 'flavor.contact.ShortName',
            ],
            
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
