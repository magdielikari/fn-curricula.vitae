<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "skill".
 *
 * @property string $id
 * @property string $name
 * @property string $reason 
 * @property integer $order
 * @property double $score
 * @property string $color
 * @property string $level
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $logo_id
 *
 * @property Logo $logo
 * @property Skilles[] $skilles
 * @property Flavor[] $flavors
 */
class Skill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skill';
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
            [['score'], 'number'],
            [['level'], 'string'],
            [['order', 'created_at', 'created_by', 'updated_at', 'updated_by', 'logo_id'], 'integer'],
            [['name'], 'string', 'max' => 47],
            [['reason'], 'string', 'max' => 127], 
            [['color'], 'string', 'max' => 7],
            [['logo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Logo::className(), 'targetAttribute' => ['logo_id' => 'id']],
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
            'reason' => Yii::t('app', 'Reason'),
            'order' => Yii::t('app', 'Order'), 
            'score' => Yii::t('app', 'Score'),
            'color' => Yii::t('app', 'Color'),
            'level' => Yii::t('app', 'Level'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'logo_id' => Yii::t('app', 'Logo ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogo()
    {
        return $this->hasOne(Logo::className(), ['id' => 'logo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkilles()
    {
        return $this->hasMany(Skilles::className(), ['skill_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFlavors()
    {
        return $this->hasMany(Flavor::className(), ['id' => 'flavor_id'])->viaTable('skilles', ['skill_id' => 'id']);
    }

    /**
     *
     */
    public function getSummary()
    {
        return $this->name . ' '
            . $this->reason . '. ('
            . $this->order . ')';
    }

    /**
     * @inheritdoc
     * @return \app\models\query\SkillQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\SkillQuery(get_called_class());
    }
}
