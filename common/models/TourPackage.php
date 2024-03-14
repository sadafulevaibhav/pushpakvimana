<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tour_package".
 *
 * @property int $id
 * @property string $package_name
 * @property string $package_media
 *
 * @property DestinationPackage[] $destinationPackages
 */
class TourPackage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tour_package';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['package_name', 'package_media'], 'required'],
            [['package_name', 'package_media'], 'string', 'max' => 50],
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
            'package_media' => Yii::t('app', 'Package Media'),
        ];
    }

    /**
     * Gets query for [[DestinationPackages]].
     *
     * @return \yii\db\ActiveQuery|DestinationPackageQuery
     */
    public function getDestinationPackages()
    {
        return $this->hasMany(DestinationPackage::class, ['package_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TourPackageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TourPackageQuery(get_called_class());
    }
}
