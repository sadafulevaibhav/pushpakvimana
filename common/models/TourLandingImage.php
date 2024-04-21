<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tour_landing_image".
 *
 * @property int $id
 * @property string $image_path
 * @property int $country_id
 */
class TourLandingImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tour_landing_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image_path', 'country_id'], 'required'],
            [['country_id'], 'integer'],
            [['image_path'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'image_path' => Yii::t('app', 'Image Path'),
            'country_id' => Yii::t('app', 'Country ID'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TourLandingImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TourLandingImageQuery(get_called_class());
    }
}
