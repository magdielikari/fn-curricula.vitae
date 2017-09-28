<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\helpers\Html;

/**
 * This is the model class for table "experience".
 *
 * @property string $id
 * @property string $charged_down
 * @property string $company_name
 * @property string $reason 
 * @property integer $order
 * @property string $duration
 * @property integer $from 
 * @property integer $to 
 * @property string $description
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 *
 * @property Experiences[] $experiences
 * @property Flavor[] $flavors
 */
class Experience extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'experience';
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
            [['charged_down', 'company_name'], 'required'],
            [['order', 'duration', 'from', 'to', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['charged_down', 'company_name', 'reason', 'description'], 'string', 'max' => 127],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'charged_down' => Yii::t('app', 'Charged Down'),
            'company_name' => Yii::t('app', 'Company Name'),
            'reason' => Yii::t('app', 'Reason'), 
            'order' => Yii::t('app', 'Order'),
            'duration' => Yii::t('app', 'Duration'),
            'from' => Yii::t('app', 'From'), 
            'to' => Yii::t('app', 'To'), 
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExperiences()
    {
        return $this->hasMany(Experiences::className(), ['experience_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlavors()
    {
        return $this->hasMany(Flavor::className(), ['id' => 'flavor_id'])->viaTable('experiences', ['experience_id' => 'id']);
    }

    /**
     *
     */
    public function getSummary()
    {
        return $this->charged_down . '. ' 
            . $this->company_name . ' (' 
            . $this->from . ' - ' 
            . $this->to . ')';
    }

    /**
     * @inheritdoc
     * @return \app\models\query\ExperienceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\ExperienceQuery(get_called_class());
    }
}
