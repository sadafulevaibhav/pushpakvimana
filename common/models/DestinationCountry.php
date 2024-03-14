<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "destination_country".
 *
 * @property int $id
 * @property string $country_code
 * @property string $country_name
 * @property string $destination_media
 */
class DestinationCountry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'destination_country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_code'], 'string', 'max' => 2],
            [['country_name', 'destination_media'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'country_code' => Yii::t('app', 'Country Code'),
            'country_name' => Yii::t('app', 'Country Name'),
            'destination_media' => Yii::t('app', 'Destination Media'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return DestinationCountryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DestinationCountryQuery(get_called_class());
    }
}
