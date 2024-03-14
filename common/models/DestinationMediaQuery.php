<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[DestinationMedia]].
 *
 * @see DestinationMedia
 */
class DestinationMediaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DestinationMedia[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DestinationMedia|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
