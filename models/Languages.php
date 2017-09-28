<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "languages".
 *
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 * @property string $language_id
 * @property string $flavor_id
 *
 * @property Flavor $flavor
 * @property Language $language
 */
class Languages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'languages';
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
            [['created_at', 'created_by', 'updated_at', 'updated_by', 'language_id', 'flavor_id'], 'integer'],
            [['language_id', 'flavor_id'], 'required'],
            [['flavor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Flavor::className(), 'targetAttribute' => ['flavor_id' => 'id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
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
            'language_id' => Yii::t('app', 'Language ID'),
            'flavor_id' => Yii::t('app', 'Flavor ID'),
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
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\query\LanguagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\LanguagesQuery(get_called_class());
    }
}
