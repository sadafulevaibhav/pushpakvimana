<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "destination_package".
 *
 * @property int $id
 * @property string $package_name
 * @property string $package_image
 * @property string $about_trip
 * @property string $max_no_guests
 * @property int $hotel_rating
 * @property string $key_locations
 * @property float $travel_expenses
 * @property int $country_id
 * @property int $package_id
 *
 * @property DestinationCountry $country
 * @property TourPackage $package
 */
class DestinationPackage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'destination_package';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['package_name', 'package_image', 'about_trip', 'max_no_guests', 'hotel_rating', 'key_locations', 'travel_expenses', 'country_id', 'package_id'], 'required'],
            [['hotel_rating', 'country_id', 'package_id'], 'integer'],
            [['package_addons'], 'safe'],
            [['key_locations'], 'string'],
            [['travel_expenses'], 'number'],
            [['package_name', 'about_trip'], 'string', 'max' => 255],
            [['package_image'], 'string', 'max' => 100],
            [['max_no_guests'], 'string', 'max' => 50],
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
            'package_name' => Yii::t('app', 'Package Name'),
            'package_image' => Yii::t('app', 'Package Image'),
            'about_trip' => Yii::t('app', 'About Trip'),
            'max_no_guests' => Yii::t('app', 'Max No Guests'),
            'hotel_rating' => Yii::t('app', 'Hotel Rating'),
            'key_locations' => Yii::t('app', 'Key Locations'),
            'travel_expenses' => Yii::t('app', 'Travel Expenses'),
            'country_id' => Yii::t('app', 'Country'),
            'package_id' => Yii::t('app', 'Package'),
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
     * @return DestinationPackageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DestinationPackageQuery(get_called_class());
    }
}
