<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[DestinationCountry]].
 *
 * @see DestinationCountry
 */
class DestinationCountryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DestinationCountry[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DestinationCountry|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
