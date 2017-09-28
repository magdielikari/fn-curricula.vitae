<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SkillesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Skilles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skilles-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Skilles'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'skill_id',
                'label' => Yii::t('app','Skill Name'),
                'value' => 'skill.name',
            ],
            [
                'attribute' => 'skill_id',
                'label' => Yii::t('app','Skill Reason'),
                'value' => 'skill.reason',
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
