<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "activities".
 *
 * @property int $id
 * @property string $activity_name
 * @property float $activity_price
 * @property string $activity_icon
 * @property int $country_id
 */
class Activities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['activity_name', 'activity_price', 'activity_icon', 'country_id'], 'required'],
            [['activity_price'], 'number'],
            [['country_id'], 'integer'],
            [['activity_name', 'activity_icon'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'activity_name' => 'Activity Name',
            'activity_price' => 'Activity Price',
            'activity_icon' => 'Activity Icon',
            'country_id' => 'Country ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ActivitiesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ActivitiesQuery(get_called_class());
    }
}
