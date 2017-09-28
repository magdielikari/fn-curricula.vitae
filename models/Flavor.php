<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "flavor".
 *
 * @property string $id
 * @property string $name
 * @property string $profession
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $contact_id
 * @property string $additional_id
 * @property string $stylesheets_id
 *
 * @property Academics[] $academics
 * @property Academic[] $academics0
 * @property Attitudes[] $attitudes
 * @property Attitude[] $attitudes0
 * @property Experiences[] $experiences
 * @property Experience[] $experiences0
 * @property Additional $additional
 * @property Contact $contact
 * @property Stylesheets $stylesheets
 * @property Hobbies[] $hobbies
 * @property Hobby[] $hobbies0
 * @property Languages[] $languages
 * @property Language[] $languages0
 * @property Skilles[] $skilles
 * @property Skill[] $skills
 * @property Technologies[] $technologies
 * @property Technology[] $technologies0
 */
class Flavor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flavor';
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
            [['profession', 'contact_id', 'stylesheets_id'], 'required'],
            [['created_at', 'created_by', 'updated_at', 'updated_by', 'contact_id', 'additional_id', 'stylesheets_id'], 'integer'],
            [['name', 'profession'], 'string', 'max' => 127],
            [['additional_id'], 'exist', 'skipOnError' => true, 'targetClass' => Additional::className(), 'targetAttribute' => ['additional_id' => 'id']],
            [['contact_id'], 'exist', 'skipOnError' => true, 'targetClass' => Contact::className(), 'targetAttribute' => ['contact_id' => 'id']],
            [['stylesheets_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stylesheets::className(), 'targetAttribute' => ['stylesheets_id' => 'id']],
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
            'profession' => Yii::t('app', 'Profession'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'contact_id' => Yii::t('app', 'Contact ID'),
            'additional_id' => Yii::t('app', 'Additional ID'),
            'stylesheets_id' => Yii::t('app', 'Stylesheets ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcademics()
    {
        return $this->hasMany(Academics::className(), ['flavor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcademics0()
    {
        return $this->hasMany(Academic::className(), ['id' => 'academic_id'])->viaTable('academics', ['flavor_id' => 'id'])->current();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttitudes()
    {
        return $this->hasMany(Attitudes::className(), ['flavor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttitudes0()
    {
        return $this->hasMany(Attitude::className(), ['id' => 'attitude_id'])->viaTable('attitudes', ['flavor_id' => 'id'])->current();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExperiences()
    {
        return $this->hasMany(Experiences::className(), ['flavor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExperiences0()
    {
        return $this->hasMany(Experience::className(), ['id' => 'experience_id'])->viaTable('experiences', ['flavor_id' => 'id'])->current();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdditional()
    {
        return $this->hasOne(Additional::className(), ['id' => 'additional_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContact()
    {
        return $this->hasOne(Contact::className(), ['id' => 'contact_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStylesheets()
    {
        return $this->hasOne(Stylesheets::className(), ['id' => 'stylesheets_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHobbies()
    {
        return $this->hasMany(Hobbies::className(), ['flavor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHobbies0()
    {
        return $this->hasMany(Hobby::className(), ['id' => 'hobby_id'])->viaTable('hobbies', ['flavor_id' => 'id'])->current();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasMany(Languages::className(), ['flavor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages0()
    {
        return $this->hasMany(Language::className(), ['id' => 'language_id'])->viaTable('languages', ['flavor_id' => 'id'])->current();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkilles()
    {
        return $this->hasMany(Skilles::className(), ['flavor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkills()
    {
        return $this->hasMany(Skill::className(), ['id' => 'skill_id'])->viaTable('skilles', ['flavor_id' => 'id'])->current();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTechnologies()
    {
        return $this->hasMany(Technologies::className(), ['flavor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTechnologies0()
    {
        return $this->hasMany(Technology::className(), ['id' => 'technology_id'])->viaTable('technologies', ['flavor_id' => 'id'])->current();
    }

    /**
     * @inheritdoc
     * @return \app\models\query\FlavorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\FlavorQuery(get_called_class());
    }
}
