<?php

use yii\helpers\Html;

echo Html::img(['image/view', 'filename' => $model->image->baseName . '.' . $model->image->extension], ['class' => 'img-responsive']);
