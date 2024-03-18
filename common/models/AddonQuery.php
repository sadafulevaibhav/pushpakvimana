<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Addon]].
 *
 * @see Addon
 */
class AddonQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Addon[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Addon|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
