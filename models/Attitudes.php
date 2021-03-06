<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "attitudes".
 *
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $attitude_id
 * @property string $flavor_id
 *
 * @property Attitude $attitude
 * @property Flavor $flavor
 */
class Attitudes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attitudes';
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
            [['created_at', 'created_by', 'updated_at', 'updated_by', 'attitude_id', 'flavor_id'], 'integer'],
            [['attitude_id', 'flavor_id'], 'required'],
            [['attitude_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attitude::className(), 'targetAttribute' => ['attitude_id' => 'id']],
            [['flavor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Flavor::className(), 'targetAttribute' => ['flavor_id' => 'id']],
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
            'attitude_id' => Yii::t('app', 'Attitude ID'),
            'flavor_id' => Yii::t('app', 'Flavor ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttitude()
    {
        return $this->hasOne(Attitude::className(), ['id' => 'attitude_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlavor()
    {
        return $this->hasOne(Flavor::className(), ['id' => 'flavor_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\AttitudesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\AttitudesQuery(get_called_class());
    }
}
