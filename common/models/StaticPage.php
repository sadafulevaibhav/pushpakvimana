<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "static_page".
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
        return 'static_page';
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
            'id' => 'ID',
            'name' => 'Name',
            'heading' => 'Heading',
            'description' => 'Description',
            'seo_title' => 'Seo Title',
            'seo_keywords' => 'Seo Keywords',
            'seo_description' => 'Seo Description',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'slug',
            ],
        ];
    }
}
