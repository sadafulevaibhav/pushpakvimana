<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TourLandingImage]].
 *
 * @see TourLandingImage
 */
class TourLandingImageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TourLandingImage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TourLandingImage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
