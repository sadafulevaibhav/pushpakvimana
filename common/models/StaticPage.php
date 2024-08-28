<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%static_page}}".
 *
 * @property int $id
 * @property string $name
 * @property string $heading
 * @property string $description
 * @property string|null $seo_title
 * @property string|null $seo_keywords
 * @property string|null $seo_description
 */
class StaticPage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%static_page}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'heading', 'description'], 'required'],
            [['description', 'seo_description'], 'string'],
            [['name', 'heading', 'seo_title', 'seo_keywords'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'heading' => Yii::t('app', 'Heading'),
            'description' => Yii::t('app', 'Description'),
            'seo_title' => Yii::t('app', 'Seo Title'),
            'seo_keywords' => Yii::t('app', 'Seo Keywords'),
            'seo_description' => Yii::t('app', 'Seo Description'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return StaticPageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StaticPageQuery(get_called_class());
    }
}
