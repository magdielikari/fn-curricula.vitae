<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "stylesheets".
 *
 * @property string $id
 * @property string $name
 * @property string $full_name_contact_tag
 * @property string $full_name_contact_style
 * @property string $short_name_contact_tag
 * @property string $short_name_contact_style
 * @property string $medium_name_contact_tag
 * @property string $medium_name_contact_style
 * @property string $profession_flavor_tag
 * @property string $profession_flavor_style
 * @property string $contact_additional_tag
 * @property string $contact_additional_style
 * @property string $photo_contact_style
 * @property string $icon_phone_contact_style
 * @property string $icon_dni_contact_style
 * @property string $icon_birth_contact_style
 * @property string $icon_email_contact_style
 * @property string $icon_address_contact_style
 * @property string $icon_location_contact_style
 * @property string $description_additional_style
 * @property string $icon_phone_additional_style
 * @property string $icon_github_additional_style
 * @property string $icon_gitlab_additional_style
 * @property string $icon_bitbucket_additional_style
 * @property string $icon_linkedIn_additional_style
 * @property string $icon_twitter_additional_style
 * @property string $icon_codePen_additional_style
 * @property string $icon_pinterest_additional_style
 * @property string $icon_other_additional_style
 * @property string $icon_personal_web_additional_style
 * @property string $icon_description_additional_style
 * @property string $experience_tag
 * @property string $experience_style
 * @property string $icon_experience_style
 * @property string $item_experience_style
 * @property string $academic_tag
 * @property string $academic_style
 * @property string $icon_academic_style
 * @property string $item_academic_style
 * @property string $technology_tag
 * @property string $technology_style
 * @property string $icon_technology_style
 * @property string $svg_technology_style
 * @property string $hobby_tag
 * @property string $hobby_style
 * @property string $icon_hobby_style
 * @property string $svg_hobby_style
 * @property string $skill_tag
 * @property string $skill_style
 * @property string $icon_skill_style
 * @property string $svg_skill_style
 * @property string $lenguage_tag
 * @property string $lenguage_style
 * @property string $icon_lenguage_style
 * @property string $svg_languages_style
 * @property string $attitude_tag
 * @property string $attitude_style
 * @property string $icon_attitude_style
 * @property string $svg_attitude_style
 * @property string $background_first
 * @property string $background_second
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 *
 * @property Flavor[] $flavors
 */
class Stylesheets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stylesheets';
    }

    /**
     *  Public doc   
     */    
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className()
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 127],
            [['full_name_contact_tag', 'full_name_contact_style', 'short_name_contact_tag', 'short_name_contact_style', 'medium_name_contact_tag', 'medium_name_contact_style', 'profession_flavor_tag', 'profession_flavor_style', 'contact_additional_tag', 'contact_additional_style', 'photo_contact_style', 'icon_phone_contact_style', 'icon_dni_contact_style', 'icon_birth_contact_style', 'icon_email_contact_style', 'icon_address_contact_style', 'icon_location_contact_style', 'description_additional_style', 'icon_phone_additional_style', 'icon_github_additional_style', 'icon_gitlab_additional_style', 'icon_bitbucket_additional_style', 'icon_linkedIn_additional_style', 'icon_twitter_additional_style', 'icon_codePen_additional_style', 'icon_pinterest_additional_style', 'icon_other_additional_style', 'icon_personal_web_additional_style', 'icon_description_additional_style', 'experience_tag', 'experience_style', 'icon_experience_style', 'item_experience_style', 'academic_tag', 'academic_style', 'icon_academic_style', 'item_academic_style', 'technology_tag', 'technology_style', 'icon_technology_style', 'svg_technology_style', 'hobby_tag', 'hobby_style', 'icon_hobby_style', 'svg_hobby_style', 'skill_tag', 'skill_style', 'icon_skill_style', 'svg_skill_style', 'lenguage_tag', 'lenguage_style', 'icon_lenguage_style', 'svg_languages_style', 'attitude_tag', 'attitude_style', 'icon_attitude_style', 'svg_attitude_style', 'background_first', 'background_second'], 'string', 'max' => 47],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'full_name_contact_tag' => Yii::t('app', 'Full Name Contact Tag'),
            'full_name_contact_style' => Yii::t('app', 'Full Name Contact Style'),
            'short_name_contact_tag' => Yii::t('app', 'Short Name Contact Tag'),
            'short_name_contact_style' => Yii::t('app', 'Short Name Contact Style'),
            'medium_name_contact_tag' => Yii::t('app', 'Medium Name Contact Tag'),
            'medium_name_contact_style' => Yii::t('app', 'Medium Name Contact Style'),
            'profession_flavor_tag' => Yii::t('app', 'Profession Flavor Tag'), 
            'profession_flavor_style' => Yii::t('app', 'Profession Flavor Style'), 
            'contact_additional_style' => Yii::t('app', 'Contact Additional Style'),
            'photo_contact_style' => Yii::t('app', 'Photo Contact Style'), 
            'icon_phone_contact_style' => Yii::t('app', 'Icon Phone Contact Style'),
            'icon_dni_contact_style' => Yii::t('app', 'Icon Dni Contact Style'), 
            'icon_birth_contact_style' => Yii::t('app', 'Icon Birth Contact Style'),
            'icon_email_contact_style' => Yii::t('app', 'Icon Email Contact Style'),
            'icon_address_contact_style' => Yii::t('app', 'Icon Address Contact Style'),
            'icon_location_contact_style' => Yii::t('app', 'Icon Location Contact Style'), 
            'description_additional_style' => Yii::t('app', 'Description Additional Style'),            
            'icon_phone_additional_style' => Yii::t('app', 'Icon Phone Additional Style'),
            'icon_github_additional_style' => Yii::t('app', 'Icon Github Additional Style'),
            'icon_gitlab_additional_style' => Yii::t('app', 'Icon Gitlab Additional Style'),
            'icon_bitbucket_additional_style' => Yii::t('app', 'Icon Bitbucket Additional Style'),
            'icon_linkedIn_additional_style' => Yii::t('app', 'Icon Linked In Additional Style'),
            'icon_twitter_additional_style' => Yii::t('app', 'Icon Twitter Additional Style'),
            'icon_codePen_additional_style' => Yii::t('app', 'Icon Code Pen Additional Style'),
            'icon_pinterest_additional_style' => Yii::t('app', 'Icon Pinterest Additional Style'),
            'icon_other_additional_style' => Yii::t('app', 'Icon Other Additional Style'),
            'icon_personal_web_additional_style' => Yii::t('app', 'Icon Personal Web Additional Style'),
            'icon_description_additional_style' => Yii::t('app', 'Icon Description Additional Style'),
            'experience_tag' => Yii::t('app', 'Experience Tag'),
            'experience_style' => Yii::t('app', 'Experience Style'),
            'icon_experience_style' => Yii::t('app', 'Icon Experience Style'),
            'item_experience_style' => Yii::t('app', 'Item Experience Style'), 
            'academic_tag' => Yii::t('app', 'Academic Tag'),
            'academic_style' => Yii::t('app', 'Academic Style'),
            'icon_academic_style' => Yii::t('app', 'Icon Academic Style'),
            'item_academic_style' => Yii::t('app', 'Item Academic Style'), 
            'technology_tag' => Yii::t('app', 'Technology Tag'),
            'technology_style' => Yii::t('app', 'Technology Style'),
            'icon_technology_style' => Yii::t('app', 'Icon Technology Style'),
            'svg_technology_style' => Yii::t('app', 'Svg Technology Style'), 
            'hobby_tag' => Yii::t('app', 'Hobby Tag'),
            'hobby_style' => Yii::t('app', 'Hobby Style'),
            'icon_hobby_style' => Yii::t('app', 'Icon Hobby Style'),
            'svg_hobby_style' => Yii::t('app', 'Svg Hobby Style'),
            'skill_tag' => Yii::t('app', 'Skill Tag'),
            'skill_style' => Yii::t('app', 'Skill Style'),
            'icon_skill_style' => Yii::t('app', 'Icon Skill Style'),
            'svg_skill_style' => Yii::t('app', 'Svg Skill Style'), 
            'lenguage_tag' => Yii::t('app', 'Lenguage Tag'),
            'lenguage_style' => Yii::t('app', 'Lenguage Style'),
            'icon_lenguage_style' => Yii::t('app', 'Icon Lenguage Style'),
            'svg_languages_style' => Yii::t('app', 'Svg Languages Style'),
            'attitude_tag' => Yii::t('app', 'Attitude Tag'),
            'attitude_style' => Yii::t('app', 'Attitude Style'),
            'icon_attitude_style' => Yii::t('app', 'Icon Attitude Style'),
            'svg_attitude_style' => Yii::t('app', 'Svg Attitude Style'),
            'background_first' => Yii::t('app', 'Background First'), 
            'background_second' => Yii::t('app', 'Background Second'), 
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlavors()
    {
        return $this->hasMany(Flavor::className(), ['stylesheets_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\StylesheetsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\StylesheetsQuery(get_called_class());
    }
}
