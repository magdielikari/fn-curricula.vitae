<?php

use yii\helpers\Html;
use app\models\Logo;

/* @var $this yii\web\View */
/* @var $model app\models\Flavor */
$this->title = $model->name;
// Html::encode($model->name)
$acad = $model->academics0;
$expe = $model->experiences0;
$skil = $model->skills;
$atti = $model->attitudes0;
$hobb = $model->hobbies0;
$tech = $model->technologies0;
$hobbies = '';
foreach ($hobb as $key => $value) {
    $hobbies .= '{text: "' . $hobb[$key]->name . 
        '", weight: ' . $hobb[$key]->score .'},';
}
$colors = '';
foreach ($hobb as $key => $value) {
    $colors .= '"'. $hobb[$key]->color .'", ';
}
/*
"#800026", "#bd0026", "#e31a1c", "#fc4e2a"
    {text: "Leer", weight: 9.5},
    {text: "Ir al Teatro", weight: 9.4},
    {text: "Trabajo Voluntario", weight: 9.3},
    {text: "Asistir a ExpoFeria", weight: 9.2},
*/
//$svgs = $model->stylesheets->svg_technology_style
?>

<?= Html::tag('div',
// Div column 5 
        Html::tag('div', 
            Html::tag($model->stylesheets->short_name_contact_tag,
                $model->contact->shortName,
            ['class' => $model->stylesheets->short_name_contact_style])
            . Html::tag($model->stylesheets->profession_flavor_tag,
                $model->profession,
            ['class' => $model->stylesheets->profession_flavor_style])
            ,
        ['class' => 'col-xs-5 '. $model->stylesheets->background_first])
// Div column 7
        . Html::tag('div',
            Html::tag($model->stylesheets->academic_tag,
                Html::tag('i',
                    ' ' . Yii::t('app','Academic'),
                ['class' => $model->stylesheets->icon_academic_style]),
            ['class' => $model->stylesheets->academic_style])
            . Html::ul($acad, ['item' => function($acad,$model) {
                return Html::tag('p',
                        Html::tag('strong',
                            $acad->institute_name . ': ')
                            . $acad->titration
                            . ',' . $acad->to);
                    }
                ])
            , 
        ['class' => 'col-xs-7']),
    ['class' => 'row'])
?>

<br>

<?= Html::tag('div',
// Div Column 5
        Html::tag('div',
            Html::img($model->contact->getImageSrc(), 
            ['alt' => $model->contact->shortName, 'class' => $model->stylesheets->photo_contact_style])
            ,
        ['class' => 'col-xs-5'])
// Div Column 7
        . Html::tag('div',
            Html::tag('p',
                $model->additional->description,
            ['class' => $model->stylesheets->description_additional_style])
            . Html::tag($model->stylesheets->technology_tag,
                Html::tag('i',
                    ' ' . Yii::t('app','Technology'),
                ['class' => $model->stylesheets->icon_technology_style]),
            ['class' => $model->stylesheets->technology_style])
            . Html::ul($tech, ['separator' => ' ',
                'item' => function($tech) {
                    return Logo::addStyleSvg($tech->logo->svg, 'ic-sm');
                }
            ])
            ,
        ['class' => 'col-xs-7']),
    ['class' => 'row'])
?>

<br>

<?= Html::tag('div',
// Div column 5
        Html::tag('div',
            Html::tag($model->stylesheets->profession_flavor_tag,
                Html::tag('i', '  '
                    . $model->contact->dni . ', ' 
                    . $model->contact->location,
                ['class' => $model->stylesheets->icon_dni_contact_style, 
                 'aria-hidden' => "true"]),
            ['class' => $model->stylesheets->contact_additional_style])
            . Html::tag($model->stylesheets->profession_flavor_tag,
                Html::tag('i', '  '
                    . $model->contact->address,
                ['class' => $model->stylesheets->icon_address_contact_style, 
                 'aria-hidden' => "true"]),
            ['class' => $model->stylesheets->contact_additional_style])
            . Html::tag($model->stylesheets->profession_flavor_tag,
                Html::tag('i', '  '
                    . $model->contact->email,
                ['class' => $model->stylesheets->icon_email_contact_style, 
                 'aria-hidden' => "true"]),
            ['class' => $model->stylesheets->contact_additional_style])
            . Html::tag($model->stylesheets->profession_flavor_tag,
                Html::tag('i', '  '
                    . Yii::$app->formatter->asDecimal($model->contact->phone),
                ['class' => $model->stylesheets->icon_phone_contact_style, 
                 'aria-hidden' => "true"]),
            ['class' => $model->stylesheets->contact_additional_style])
            . Html::tag($model->stylesheets->skill_tag,
                Html::tag('i', '  '
                    . Yii::t('app','Skill'),
                ['class' => $model->stylesheets->icon_skill_style, 
                 'aria-hidden' => "true"]),
            ['class' => $model->stylesheets->profession_flavor_style])
            . Html::ul($skil, ['class' => $model->stylesheets->skill_style,
                'item' => function($skil,$model) {
                    return Html::tag('li', $skil->name);
                },
            ])
            . Html::tag($model->stylesheets->attitude_tag,
                Html::tag('i', ' '
                    . Yii::t('app','Attitude'),
                ['class' => $model->stylesheets->icon_attitude_style, 
                 'aria-hidden' => "true"]),
            ['class' => $model->stylesheets->profession_flavor_style])
            . Html::ul($atti, ['class' => $model->stylesheets->attitude_style,
                'item' => function($atti,$model) {
                    return Html::tag('li', $atti->name);
                },
            ])
            ,
        ['class' => 'col-xs-5 ' . $model->stylesheets->background_first])
// Div column 7
        . Html::tag('div', 
            Html::tag($model->stylesheets->experience_tag,
                Html::tag('i',
                    ' ' . Yii::t('app','Experience'),
                ['class' => $model->stylesheets->icon_experience_style]),
            ['class' => $model->stylesheets->experience_style])
            . Html::ul($expe, ['class' => 'list-unstyled',
                'item' => function($expe) {
                    return Html::tag('li',
                            Html::tag('dl',
                                Html::tag('dt',
                                    $expe->company_name)
                                . Html::tag('dd',
                                    $expe->charged_down),
                            ['class' => 'dl-horizontal'])
                            . Html::tag('dl',
                                Html::tag('dt',
                                    $expe->from . ' - ' . $expe->to)
                                . Html::tag('dd',
                                    $expe->description),
                            ['class' => 'dl-horizontal'])
                        );
                }
            ])
            . Html::tag($model->stylesheets->experience_tag,
                Html::tag('i',
                    ' ' . Yii::t('app','Hobbies'),
                ['class' => $model->stylesheets->icon_experience_style]),
            ['class' => $model->stylesheets->experience_style])
            . Html::tag('div',
                '',
            ['id' => 'demo']),
        ['class' => 'col-xs-7']),
    ['class' => 'row'])
?>

<?= Html::script('var words = ['
            . $hobbies .
        '];

        $("#demo").jQCloud(words, {
            colors: [' . $colors . '],
            width: 677,
            height: 227,
            fontSize: {
                from: 0.03,
                to: 0.02
            }
        });', 
    ['type' => 'text/javascript']); ?>