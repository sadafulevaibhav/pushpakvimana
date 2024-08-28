<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[StaticPage]].
 *
 * @see StaticPage
 */
class StaticPageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return StaticPage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return StaticPage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
