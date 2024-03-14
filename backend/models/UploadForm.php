<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use backend\models\UploadedImages;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $image;

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $uploadPath = Yii::getAlias('@webroot/uploads/');

            // Create the upload directory if it doesn't exist
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $fileName = $this->image->baseName . '.' . $this->image->extension;
            if ($this->image->saveAs($uploadPath . $fileName)) {
                // Save details to database
                $model = new UploadedImages();
                $model->image = $fileName;
                //$model->created_at = time(); // or any other timestamp
                $model->created_at = Yii::$app->formatter->asDatetime(time()); // Format timestamp properly
                if ($model->save()) {
                    return true;
                }
            }
        }
        return false;
    }
}
