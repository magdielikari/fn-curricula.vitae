<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "additional".
 *
 * @property string $id
 * @property string $name
 * @property string $phone
 * @property string $github
 * @property string $gitlab
 * @property string $bitbucket
 * @property string $linkedIn
 * @property string $twitter
 * @property string $codePen
 * @property string $pinterest
 * @property string $other
 * @property string $personal_web
 * @property string $description
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 *
 * @property Flavor[] $flavors
 */
class Additional extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'additional';
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
            [['phone', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['name', 'github', 'gitlab', 'bitbucket', 'linkedIn', 'twitter', 'codePen', 'pinterest', 'other'], 'string', 'max' => 47],
            [['description'], 'string'], 
            [['personal_web'], 'string', 'max' => 45],
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
            'phone' => Yii::t('app', 'Phone'),
            'github' => Yii::t('app', 'Github'),
            'gitlab' => Yii::t('app', 'Gitlab'),
            'bitbucket' => Yii::t('app', 'Bitbucket'),
            'linkedIn' => Yii::t('app', 'Linked In'),
            'twitter' => Yii::t('app', 'Twitter'),
            'codePen' => Yii::t('app', 'Code Pen'),
            'pinterest' => Yii::t('app', 'Pinterest'),
            'other' => Yii::t('app', 'Other'),
            'personal_web' => Yii::t('app', 'Personal Web'),
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
    public function getFlavors()
    {
        return $this->hasMany(Flavor::className(), ['additional_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\AdditionalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\AdditionalQuery(get_called_class());
    }
}
