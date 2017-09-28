<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "academic".
 *
 * @property string $id
 * @property string $institute_name
 * @property string $titration
 * @property string $reason
 * @property integer $order
 * @property string $duration 
 * @property integer $from 
 * @property integer $to
 * @property string $place
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 *
 * @property Academics[] $academics
 * @property Flavor[] $flavors
 */
class Academic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'academic';
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
            [['institute_name', 'titration'], 'required'],
            [['order', 'duration', 'from', 'to', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['institute_name', 'titration', 'reason', 'place'], 'string', 'max' => 127],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'institute_name' => Yii::t('app', 'Institute Name'),
            'titration' => Yii::t('app', 'Titration'),
            'reason' => Yii::t('app', 'Reason'),
            'order' => Yii::t('app', 'Order'),
            'duration' => Yii::t('app', 'Duration'), 
            'from' => Yii::t('app', 'From'), 
            'to' => Yii::t('app', 'To'), 
            'place' => Yii::t('app', 'Place'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcademics()
    {
        return $this->hasMany(Academics::className(), ['academic_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlavors()
    {
        return $this->hasMany(Flavor::className(), ['id' => 'flavor_id'])->viaTable('academics', ['academic_id' => 'id']);
    }

    /**
     *
     */
    public function getSummary()
    {
        return $this->titration . ' ' 
            . $this->reason . '. ' 
            . $this->institute_name . ' (' 
            . $this->to . ') '
            . $this->place;   
    }

    /**
     * @inheritdoc
     * @return \app\models\query\AcademicQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\AcademicQuery(get_called_class());
    }
}
