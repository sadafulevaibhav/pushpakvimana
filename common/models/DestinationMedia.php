<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "destination_media".
 *
 * @property int $id
 * @property string|null $content_text
 * @property int $country_id
 * @property int $package_id
 * @property string $media_file
 * @property string $media_type
 *
 * @property DestinationCountry $country
 * @property TourPackage $package
 */
class DestinationMedia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'destination_media';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_id', 'package_id', 'media_file', 'media_type'], 'required'],
            [['country_id', 'package_id'], 'integer'],
            [['content_text'], 'string', 'max' => 255],
            [['media_file', 'media_type'], 'string', 'max' => 100],
            [['media_file'], 'file', 'extensions' => ['jpg', 'png', 'gif', 'mp4']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => DestinationCountry::class, 'targetAttribute' => ['country_id' => 'id']],
            [['package_id'], 'exist', 'skipOnError' => true, 'targetClass' => TourPackage::class, 'targetAttribute' => ['package_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'content_text' => Yii::t('app', 'Content Text'),
            'country_id' => Yii::t('app', 'Country ID'),
            'package_id' => Yii::t('app', 'Package ID'),
            'media_file' => Yii::t('app', 'Media File'),
            'media_type' => Yii::t('app', 'Media Type'),
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery|DestinationCountryQuery
     */
    public function getCountry()
    {
        return $this->hasOne(DestinationCountry::class, ['id' => 'country_id']);
    }

    /**
     * Gets query for [[Package]].
     *
     * @return \yii\db\ActiveQuery|TourPackageQuery
     */
    public function getPackage()
    {
        return $this->hasOne(TourPackage::class, ['id' => 'package_id']);
    }

    /**
     * {@inheritdoc}
     * @return DestinationMediaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DestinationMediaQuery(get_called_class());
    }
}
