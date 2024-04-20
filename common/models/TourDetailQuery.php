<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[TourDetail]].
 *
 * @see TourDetail
 */
class TourDetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TourDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TourDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
