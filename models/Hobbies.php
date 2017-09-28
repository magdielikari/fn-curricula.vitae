<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "hobbies".
 *
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $flavor_id
 * @property string $hobby_id
 *
 * @property Flavor $flavor
 * @property Hobby $hobby
 */
class Hobbies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hobbies';
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
            [['created_at', 'created_by', 'updated_at', 'updated_by', 'flavor_id', 'hobby_id'], 'integer'],
            [['flavor_id', 'hobby_id'], 'required'],
            [['flavor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Flavor::className(), 'targetAttribute' => ['flavor_id' => 'id']],
            [['hobby_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hobby::className(), 'targetAttribute' => ['hobby_id' => 'id']],
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
            'hobby_id' => Yii::t('app', 'Hobby ID'),
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
    public function getHobby()
    {
        return $this->hasOne(Hobby::className(), ['id' => 'hobby_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\HobbiesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\HobbiesQuery(get_called_class());
    }
}
