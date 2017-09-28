<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            !Yii::$app->user->isGuest ? (
                ['label' => Yii::t('app', 'User'), 'items' => [
                        ['label' => Yii::t('app', 'Contact'),'url' => ['/contact/index']],
                        ['label' => Yii::t('app', 'Additional'),'url' => ['/additional/index']],
                        ['label' => Yii::t('app', 'Experience'),'url' => ['/experience/index']],
                        ['label' => Yii::t('app', 'Academic'),'url' => ['/academic/index']],
                        ['label' => Yii::t('app', 'Logo'),'url' => ['/logo/index']],
                        ['label' => Yii::t('app', 'Stylesheets'),'url' => ['/stylesheets/index']],
                    ]
                ]
            ) : (            
                ['label' => Yii::t('app', 'Signup'), 'url' => ['/site/signup']]
            )
            ,!Yii::$app->user->isGuest ? (
                ['label' => Yii::t('app', 'User'), 'items' => [
                        ['label' => Yii::t('app', 'Flavor'),'url' => ['/flavor/index']],
                        ['label' => Yii::t('app', 'Technology'),'url' => ['/technology/index']],
                        ['label' => Yii::t('app', 'Hobby'),'url' => ['/hobby/index']],
                        ['label' => Yii::t('app', 'Skill'),'url' => ['/skill/index']],
                        ['label' => Yii::t('app', 'Language'),'url' => ['/language/index']],
                        ['label' => Yii::t('app', 'Attitude'),'url' => ['/attitude/index']],
                    ]
                ]
            ) : (            
                ['label' => 'Contact', 'url' => ['/site/contact']]
            )
            ,!Yii::$app->user->isGuest ? (
                ['label' => Yii::t('app', 'User'), 'items' => [
                        ['label' => Yii::t('app', 'Experiences'),'url' => ['/experiences/index']],
                        ['label' => Yii::t('app', 'Academics'),'url' => ['/academics/index']],
                        ['label' => Yii::t('app', 'Technologies'),'url' => ['/technologies/index']],
                        ['label' => Yii::t('app', 'Hobbies'),'url' => ['/hobbies/index']],
                        ['label' => Yii::t('app', 'Skilles'),'url' => ['/skilles/index']],
                        ['label' => Yii::t('app', 'Languages'),'url' => ['/languages/index']],
                        ['label' => Yii::t('app', 'Attitudes'),'url' => ['/attitudes/index']],
                    ]
                ]
            ) : (            
                ['label' => 'About', 'url' => ['/site/about']]
            )
            ,Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
