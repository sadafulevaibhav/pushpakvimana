<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%about_us}}".
 *
 * @property int $id
 * @property string|null $title
 * @property string $content
 * @property int $created_by
 * @property string $created_at
 * @property string $updated_at
 * @property int $updated_by
 * @property int $company_id
 */
class AboutUs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%about_us}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'created_by'], 'required'],
            [['created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 150],
            [['content'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'company_id' => Yii::t('app', 'Company ID'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return AboutUsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AboutUsQuery(get_called_class());
    }
}
