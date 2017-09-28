<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "technologies".
 *
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $flavor_id
 * @property string $technology_id
 *
 * @property Flavor $flavor
 * @property Technology $technology
 */
class Technologies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'technologies';
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
            [['created_at', 'created_by', 'updated_at', 'updated_by', 'flavor_id', 'technology_id'], 'integer'],
            [['flavor_id', 'technology_id'], 'required'],
            [['flavor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Flavor::className(), 'targetAttribute' => ['flavor_id' => 'id']],
            [['technology_id'], 'exist', 'skipOnError' => true, 'targetClass' => Technology::className(), 'targetAttribute' => ['technology_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'flavor_id' => Yii::t('app', 'Flavor ID'),
            'technology_id' => Yii::t('app', 'Technology ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlavor()
    {
        return $this->hasOne(Flavor::className(), ['id' => 'flavor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTechnology()
    {
        return $this->hasOne(Technology::className(), ['id' => 'technology_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\TechnologiesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\TechnologiesQuery(get_called_class());
    }
}
