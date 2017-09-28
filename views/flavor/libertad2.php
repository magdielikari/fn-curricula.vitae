<?php

use yii\helpers\Html;
use app\models\Logo;
use yii\helpers\VarDumper;
/* @var $this yii\web\View */
/* @var $model app\models\Flavor */
$this->title = $model->name;
// Html::encode($model->name)
$aaaa = $model->experiences;

$acad = $model->academics0;
$expe = $model->experiences0;
$skil = $model->skills;
$lang = $model->languages0;
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
//Intro Block
            Html::tag($model->stylesheets->short_name_contact_tag,
                $model->contact->shortName,
            ['class' => $model->stylesheets->short_name_contact_style])
            . Html::tag($model->stylesheets->profession_flavor_tag,
                $model->profession,
            ['class' => $model->stylesheets->profession_flavor_style])
//Information block
            . Html::tag($model->stylesheets->profession_flavor_tag,
                Html::tag('i', '  '
                    . $model->contact->dni . ', ' 
                    . $model->contact->location,
                ['class' => $model->stylesheets->icon_dni_contact_style, 
                 'aria-hidden' => "true"]),
            ['class' => $model->stylesheets->contact_additional_style])
            ,
        ['class' => 'col-xs-5 '. $model->stylesheets->background_first])
// Div column 7
        . Html::tag('div', 
// Resumen Block
            Html::tag('p',
                $model->additional->description,
            ['class' => $model->stylesheets->description_additional_style])
            , 
        ['class' => 'col-xs-7']),
    ['class' => 'row'])
?>

<br>

<?= Html::tag('div',
// Div Column 5
        Html::tag('div',
// Photo Block
            Html::img($model->contact->getImageSrc(), 
            ['alt' => $model->contact->shortName, 'class' => $model->stylesheets->photo_contact_style])
            ,
        ['class' => 'col-xs-5'])
// Div Column 7
        . Html::tag('div',
// Skill Block
            Html::tag($model->stylesheets->skill_tag,
                Html::tag('i', '  '
                    . Yii::t('app','Skill'),
                ['class' => $model->stylesheets->icon_skill_style, 
                 'aria-hidden' => "true"]),
            ['class' => $model->stylesheets->skill_style])
            . Html::ul($skil, ['class' => $model->stylesheets->skill_style,
                'item' => function($skil,$model) {
                    return Html::tag('li', 
                            Html::tag('dl',
                                Html::tag('dt',
                                    $skil->name)
                                . Html::tag('dd',
                                    $skil->reason),
                                ['class' => 'dl-horizontal'])
                        );
                },
            ])
            ,
        ['class' => 'col-xs-7']),
    ['class' => 'row'])
?>

<br>

<?= Html::tag('div',
// Div column 5
        Html::tag('div',
// Information block
            Html::tag($model->stylesheets->profession_flavor_tag,
                Html::tag('i', '  '
                    . $model->contact->email,
                ['class' => $model->stylesheets->icon_email_contact_style, 
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
                    . Yii::$app->formatter->asDecimal($model->contact->phone),
                ['class' => $model->stylesheets->icon_phone_contact_style, 
                 'aria-hidden' => "true"]),
            ['class' => $model->stylesheets->contact_additional_style])
// Experience Block
            . Html::tag($model->stylesheets->experience_tag,
                Html::tag('i',
                    ' ' . Yii::t('app','Experience'),
                ['class' => $model->stylesheets->icon_experience_style]),
            ['class' => $model->stylesheets->experience_style])
            . Html::ul($expe, ['class' => $model->stylesheets->item_experience_style,
                'item' => function($expe) {
                    return Html::tag('li',
                            Html::tag('dl',
                                Html::tag('dt',
                                    $expe->charged_down . '<br>'
                                    . $expe->from . ' - ' . $expe->to . '<br>'
                                    //. Yii::$app->formatter->asDuration($expe->duration)
                                    )
                                . Html::tag('dd',
                                    '<em>' . $expe->company_name . '</em>'
                                    . '<br>' 
                                    . $expe->description),
                            ['class' => 'dl-horizontal'])
                        );
                }
            ])
// Attribute Block
            . Html::tag($model->stylesheets->attitude_tag,
                Html::tag('i', ' '
                    . Yii::t('app','Attitude'),
                ['class' => $model->stylesheets->icon_attitude_style, 
                 'aria-hidden' => "true"]),
            ['class' => $model->stylesheets->attitude_style])
            . Html::ul($atti, ['class' => $model->stylesheets->attitude_style,
                'item' => function($atti,$model) {
                    return Html::tag('li', 
                            Html::tag('dl', 
                                Html::tag('dt',
                                    $atti->name)
                                . Html::tag('dd',
                                    $atti->reason),
                            ['class' => 'dl-horizontal'])
                        );
                },
            ])
            ,
        ['class' => 'col-xs-5 ' . $model->stylesheets->background_first])
// Div column 7
        . Html::tag('div',
// Academic Block
            Html::tag($model->stylesheets->academic_tag,
                Html::tag('i',
                    ' ' . Yii::t('app','Academic'),
                ['class' => $model->stylesheets->icon_academic_style]),
            ['class' => $model->stylesheets->academic_style])
            . Html::ul($acad, ['class' => $model->stylesheets->item_academic_style,
                'item' => function($acad) {
                    return Html::tag('li',
                            Html::tag('dl',
                                Html::tag('dt',
                                    $acad->titration . '<br>'
                                    . $acad->reason)
                                . Html::tag('dd',    
                                    $acad->institute_name . '<br>'
                                    . $acad->place . ' - ' . $acad->to)
                                ,
                            ['class' => 'dl-horizontal'])
                        );
                    }
                ])
// Technology Block
            . Html::tag($model->stylesheets->technology_tag,
                Html::tag('i',
                    ' ' . Yii::t('app','Technologies'),
                ['class' => $model->stylesheets->icon_technology_style]),
            ['class' => $model->stylesheets->technology_style])
            . Html::ul($tech, ['class' => 'marg-le-3',
                'separator' => ' ',
                'item' => function($tech) {
                    return Logo::addStyleSvg($tech->logo->svg, 'ic-sm marg-l-5');
                }
            ])
// Language Block
/*
            . Html::tag($model->stylesheets->lenguage_tag,
                Html::tag('i',
                    ' ' . Yii::t('app','Languages'),
                ['class' => $model->stylesheets->icon_lenguage_style]),
            ['class' => $model->stylesheets->lenguage_style])
            . Html::ul($lang, ['class' => $model->stylesheets->svg_languages_style,
                'item' => function($acad) {
                    return Html::tag('li',
                            Html::tag('dl',
                                Html::tag('dt',
                                    $acad->name)
                                . Html::tag('dd',    
                                    Html::tag('div',
                                        Html::tag('div',
                                            Html::tag('strong',
                                                $acad->level),       
                                        ['class' => 'progress-bar progress-bar-success', 
                                        'role' => 'progressbar', 'aria-valuenow'=> $acad->score,
                                        'aria-valuemin' => 0, 'aria-valuemax' => 100,
                                        'style' => 'width: '. $acad->score . '0%']),
                                    ['class' => 'progress'])
                                ),
                            ['class' => 'dl-horizontal'])
                        );
                    }
                ])      
*/
// Hobby Block
            . Html::tag($model->stylesheets->hobby_tag,
                Html::tag('i',
                    ' ' . Yii::t('app','Hobbies'),
                ['class' => $model->stylesheets->icon_hobby_style]),
            ['class' => $model->stylesheets->hobby_style])
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
            width: 601,
            height: 127,
            fontSize: {
                from: 0.05,
                to: 0.03
            }
        });', 
    ['type' => 'text/javascript']); ?>

<!--
<pre>
<?= VarDumper::dump($aaaa) ?>
</pre>

