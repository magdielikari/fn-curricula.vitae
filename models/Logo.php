<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "logo".
 *
 * @property string $id
 * @property string $name
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 *
 * @property Attitude[] $attitudes
 * @property Hobby[] $hobbies
 * @property Language[] $languages
 * @property Skill[] $skills
 * @property Technology[] $technologies
 */
class Logo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'logo';
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
            [['name'], 'required'],
            [['name'], 'string'],
            [['name', 'svg'], 'required'],
            [['svg'], 'string'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 47], 
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
            'svg' => Yii::t('app', 'Svg'), 
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttitudes()
    {
        return $this->hasMany(Attitude::className(), ['logo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHobbies()
    {
        return $this->hasMany(Hobby::className(), ['logo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasMany(Language::className(), ['logo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkills()
    {
        return $this->hasMany(Skill::className(), ['logo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTechnologies()
    {
        return $this->hasMany(Technology::className(), ['logo_id' => 'id']);
    }

    /**
     *
     */
    public static function addStyleSvg($svg, $attr)
    {
        $a = strstr($svg, ' ');
        return '<svg class = "' . $attr . '"' . $a; 
    }

    /**
     * @inheritdoc
     * @return \app\models\query\LogoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\LogoQuery(get_called_class());
    }
}
