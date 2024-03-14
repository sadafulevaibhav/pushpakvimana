<?php

use yii\helpers\Html;

echo "Image uploaded successfully!<br>";

// Display a link to view the uploaded image
echo Html::a('View Uploaded Image', ['upload/view', 'filename' => $model->image->baseName . '.' . $model->image->extension]);
