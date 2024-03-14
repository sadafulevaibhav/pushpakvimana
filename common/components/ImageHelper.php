<?php

namespace common\components;

use Yii;
use yii\web\NotFoundHttpException;

class ImageHelper
{
    /**
     * Deletes an image file from the specified path.
     *
     * @param string $imagePath The path to the image file.
     * @throws NotFoundHttpException if the image file is not found.
     */
    public static function deleteImage($imagePath)
    {
        if (!file_exists($imagePath)) {
            throw new NotFoundHttpException('The requested image file does not exist.');
        }

        if (!unlink($imagePath)) {
            Yii::$app->session->setFlash('error', 'Failed to delete the image file.');
        } else {
            Yii::$app->session->setFlash('success', 'Image file deleted successfully.');
        }
    }
}
