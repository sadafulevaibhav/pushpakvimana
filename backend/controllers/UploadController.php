<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\UploadForm;
use backend\models\UploadedImages;
use yii\web\UploadedFile;
use yii\helpers\Url;

class UploadController extends Controller
{
    // Existing action for uploading image
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->upload()) {
                // file is uploaded successfully
                //return;
                return $this->render('upload_success', ['model' => $model]);
            }
        }

        /*
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $fileName = $model->image->baseName . '.' . $model->image->extension;
            $model->image->saveAs('uploads/' . $fileName);

            // Redirect or display success message
        }
        */
        return $this->render('upload', ['model' => $model]);
    }

    // New action to view the uploaded image
    public function actionView($filename)
    {
        $imagePath = Yii::getAlias('@webroot/uploads/') . $filename;
        if (file_exists($imagePath)) {
            return Yii::$app->response->sendFile($imagePath, null, ['inline' => true]);
        } else {
            throw new \yii\web\NotFoundHttpException('The requested image does not exist.');
        }
    }
}
