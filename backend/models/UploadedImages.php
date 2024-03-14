<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "uploaded_images".
 *
 * @property int $id
 * @property string $image
 * @property int $created_by
 * @property string $created_at
 * @property string $updated_at
 * @property int $updated_by
 * @property int $company_id
 */
class UploadedImages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uploaded_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['image', 'created_by', 'created_at', 'updated_at', 'updated_by', 'company_id'], 'required'],
            [['image', 'created_at'], 'required'],
            [['created_by', 'updated_by', 'company_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['image'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'image' => Yii::t('app', 'Image Name'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'company_id' => Yii::t('app', 'Company ID'),
        ];
    }
}
