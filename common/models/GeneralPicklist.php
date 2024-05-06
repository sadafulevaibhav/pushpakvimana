<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "general_picklist".
 *
 * @property int $id
 * @property string $name
 * @property string $category
 */
class GeneralPicklist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'general_picklist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category'], 'required'],
            [['name', 'category'], 'string', 'max' => 50],
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
            'category' => Yii::t('app', 'Category'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return GeneralPicklistQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GeneralPicklistQuery(get_called_class());
    }
}
