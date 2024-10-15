<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "booker_details".
 *
 * @property int $id
 * @property string|null $full_name
 * @property string|null $email
 * @property string|null $mobile
 * @property string|null $whats_app
 * @property string $travel_destination
 * @property string $travel_date
 * @property int $travellers_count
 * @property string $vacation_type
 * @property string $created_date
 */
class BookerDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booker_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['travel_destination', 'travel_date', 'travellers_count', 'vacation_type'], 'required'],
            [['travel_date', 'created_date', 'package'], 'safe'],
            [['travellers_count', 'package'], 'integer'],
            [['full_name', 'email', 'travel_destination', 'vacation_type'], 'string', 'max' => 50],
            [['mobile', 'whats_app'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'full_name' => Yii::t('app', 'Full Name'),
            'email' => Yii::t('app', 'Email'),
            'mobile' => Yii::t('app', 'Mobile'),
            'whats_app' => Yii::t('app', 'Whats App'),
            'travel_destination' => Yii::t('app', 'Travel Destination'),
            'travel_date' => Yii::t('app', 'Travel Date'),
            'package' => Yii::t('app', 'Package'),
            'travellers_count' => Yii::t('app', 'Travellers Count'),
            'vacation_type' => Yii::t('app', 'Vacation Type'),
            'created_date' => Yii::t('app', 'Created Date'),
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery|TravelerBooking
     */
    public function getBookings()
    {
        return $this->hasMany(TravelerBooking::class, ['id' => 'booker_id']);
    }

      /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery|DestinationPackage
     */
    public function getPackage()
    {
        return $this->hasMany(DestinationPackage::class, ['id' => 'package']);
    }
}
