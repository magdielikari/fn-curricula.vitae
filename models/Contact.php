<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "contact".
 *
 * @property string $id
 * @property string $first_name
 * @property string $second_name
 * @property string $third_name
 * @property string $last_name
 * @property string $photo
 * @property string $phone
 * @property string $dni
 * @property string $birth
 * @property string $email
 * @property string $address
 * @property string $location 
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 *
 * @property Flavor[] $flavors
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'imageUploaderBehavior' => [
                'class' => 'demi\image\ImageUploaderBehavior',
                'imageConfig' => [
                    // Name of image attribute where the image will be stored
                    'imageAttribute' => 'photo',
                    // Yii-alias to dir where will be stored subdirectories with images
                    'savePathAlias' => '@app/web/images/product',
                    // Yii-alias to root project dir, relative path to the image will exclude this part of the full path
                    'rootPathAlias' => '@app/web',
                    // Name of default image. Image placed to: webrooot/images/{noImageBaseName}
                    // You must create all noimage files: noimage.jpg, medium_noimage.jpg, small_noimage.jpg, etc.
                    'noImageBaseName' => 'noimage.jpg',
                    // List of thumbnails sizes.
                    // Format: [prefix=>max_width]
                    // Thumbnails height calculated proportionally automatically
                    // Prefix '' is special, it determines the max width of the main image
                    'imageSizes' => [
                        '' => 283,
                        'small_' => 127,
                    ],
                    // This params will be passed to \yii\validators\ImageValidator
                    'imageValidatorParams' => [
                        'minWidth' => 200,
                        'minHeight' => 150,
                    ],
                    // Cropper config
                    'aspectRatio' => 4 / 3, // or 16/9(wide) or 1/1(square) or any other ratio. Null - free ratio
                    // default config
                    'imageRequire' => false,
                    'fileTypes' => 'jpg,jpeg,gif,png',
                    'maxFileSize' => 10485760, // 10mb
                    // If backend is located on a subdomain 'admin.', and images are uploaded to a directory
                    // located in the frontend, you can set this param and then getImageSrc() will be return
                    // path to image without subdomain part even in backend part
                    //'backendSubdomain' => 'admin.',
                ],
            ],
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
            [['first_name', 'last_name', 'phone', 'email', 'address'], 'required'],
            [['phone', 'dni', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['birth'], 'safe'],
            [['first_name', 'second_name', 'third_name', 'last_name', 'location'], 'string', 'max' => 47],
            [['photo', 'address'], 'string', 'max' => 257],
            [['email'], 'string', 'max' => 127],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'second_name' => Yii::t('app', 'Second Name'),
            'third_name' => Yii::t('app', 'Third Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'photo' => Yii::t('app', 'Photo'),
            'phone' => Yii::t('app', 'Phone'),
            'dni' => Yii::t('app', 'Dni'),
            'birth' => Yii::t('app', 'Birth'),
            'email' => Yii::t('app', 'Email'),
            'address' => Yii::t('app', 'Address'),
            'location' => Yii::t('app', 'Location'), 
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
        return $this->hasMany(Flavor::className(), ['contact_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullName()
    {
        return $this->first_name . ' ' . $this->second_name . ' ' . $this->third_name . ' ' . $this->last_name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMediumName()
    {
        return $this->first_name . ' ' . $this->second_name . ' ' . $this->last_name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShortName()
    {
        return $this->first_name . ' ' .  $this->last_name;
    }

    /**
     * @inheritdoc
     * @return \app\models\query\ContactQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\ContactQuery(get_called_class());
    }
}
