<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tour_itinerary".
 *
 * @property int $id
 * @property string $itinerary_day
 * @property int $country_id
 * @property int $package_id
 * @property string $activities
 *
 * @property DestinationCountry $country
 * @property TourPackage $package
 */
class TourItinerary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tour_itinerary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['itinerary_day', 'country_id', 'package_id', 'activities'], 'required'],
            [['country_id', 'package_id'], 'integer'],
            [['activities'], 'string'],
            [['itinerary_day'], 'string', 'max' => 50],
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
            'itinerary_day' => Yii::t('app', 'Itinerary Day'),
            'country_id' => Yii::t('app', 'Country ID'),
            'package_id' => Yii::t('app', 'Package ID'),
            'activities' => Yii::t('app', 'Activities'),
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
     * @return TourItineraryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TourItineraryQuery(get_called_class());
    }
}
