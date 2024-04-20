<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tour_detail".
 *
 * @property int $id
 * @property string $tour_start_date
 * @property string $tour_end_date
 * @property string $tour_origin
 * @property string $tour_destination
 * @property int $package_id
 */
class TourDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tour_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tour_start_date', 'tour_end_date', 'tour_origin', 'tour_destination', 'package_id'], 'required'],
            [['tour_start_date', 'tour_end_date'], 'safe'],
            [['package_id'], 'integer'],
            [['tour_origin', 'tour_destination'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tour_start_date' => 'Tour Start Date',
            'tour_end_date' => 'Tour End Date',
            'tour_origin' => 'Tour Origin',
            'tour_destination' => 'Tour Destination',
            'package_id' => 'Package ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TourDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TourDetailQuery(get_called_class());
    }
}
