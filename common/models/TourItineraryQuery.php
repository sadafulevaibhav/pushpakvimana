<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TourItinerary]].
 *
 * @see TourItinerary
 */
class TourItineraryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TourItinerary[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TourItinerary|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
