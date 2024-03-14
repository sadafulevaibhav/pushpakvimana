<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TourPackage */
?>
<div class="tour-package-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'package_name',
            'package_media',
        ],
    ]) ?>

</div>
