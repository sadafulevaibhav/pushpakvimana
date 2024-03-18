<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "addon".
 *
 * @property int $id
 * @property string $icon_image
 * @property string $title
 */
class Addon extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'addon';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['icon_image', 'title'], 'required'],
            [['icon_image', 'title'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'icon_image' => Yii::t('app', 'Icon Image'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return AddonQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AddonQuery(get_called_class());
    }
}
