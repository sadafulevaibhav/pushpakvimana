<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "app_testimonial".
 *
 * @property int $id
 * @property string $full_name
 * @property string $designation
 * @property string $email
 * @property string $comment
 * @property string $rating
 * @property string $image
 * @property int $created_by
 * @property string $created_at
 * @property string $updated_at
 * @property int $updated_by
 * @property int $company_id
 */
class AppTestimonial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_testimonial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['full_name', 'designation', 'email', 'comment', 'rating', 'image', 'created_by', 'created_at', 'updated_at', 'updated_by', 'company_id'], 'required'],
            [['full_name', 'designation', 'email', 'comment', 'rating', 'image'], 'required'],
            [['email'], 'email'],
            [['created_by', 'updated_by', 'company_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['full_name'], 'string', 'max' => 150],
            [['designation', 'email', 'rating', 'image'], 'string', 'max' => 50],
            [['comment'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'full_name' => Yii::t('app', 'Full Name'),
            'designation' => Yii::t('app', 'Designation'),
            'email' => Yii::t('app', 'Email'),
            'comment' => Yii::t('app', 'Comment'),
            'rating' => Yii::t('app', 'Rating'),
            'image' => Yii::t('app', 'Image'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'company_id' => Yii::t('app', 'Company ID'),
        ];
    }
}
