<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tour_inclusion_exclusion".
 *
 * @property int $id
 * @property string $description
 * @property string $type
 * @property string|null $icon
 * @property int|null $country_id
 * @property string|null $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property DestinationCountry $country
 */
class TourInclusionExclusion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tour_inclusion_exclusion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'type'], 'required'],
            [['type', 'status'], 'string'],
            [['country_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['description', 'icon'], 'string', 'max' => 255],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => DestinationCountry::class, 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'description' => Yii::t('app', 'Description'),
            'type' => Yii::t('app', 'Type'),
            'icon' => Yii::t('app', 'Icon'),
            'country_id' => Yii::t('app', 'Country ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(DestinationCountry::class, ['id' => 'country_id']);
    }
    
}
