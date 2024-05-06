<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[GeneralPicklist]].
 *
 * @see GeneralPicklist
 */
class GeneralPicklistQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return GeneralPicklist[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return GeneralPicklist|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
