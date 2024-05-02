<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tour_enquiries".
 *
 * @property int $id
 * @property string|null $full_name
 * @property string|null $email
 * @property string|null $mobile
 * @property string|null $whats_app
 * @property string $travel_destination
 * @property string $travel_date
 * @property int $travellers_count
 * @property string $vaccation_type
 * @property string $created_date
 */
class TourEnquiries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tour_enquiries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'email', 'travel_destination', 'travel_date', 'travellers_count', 'vaccation_type'], 'required'],
            [['travel_date', 'created_date'], 'safe'],
            [['travellers_count'], 'integer'],
            ['email', 'email'],
            [['full_name', 'email', 'travel_destination', 'vaccation_type'], 'string', 'max' => 50],
            [['mobile', 'whats_app'], 'string', 'max' => 12],
            [['mobile', 'whats_app'], 'match', 'pattern' => '/^\d+$/', 'message' => '{attribute} must be a numeric value'],
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
            'travellers_count' => Yii::t('app', 'Travellers Count'),
            'vaccation_type' => Yii::t('app', 'Vaccation Type'),
            'created_date' => Yii::t('app', 'Created Date'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TourEnquiriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TourEnquiriesQuery(get_called_class());
    }
}
