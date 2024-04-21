<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TourLandingImage */
?>
<div class="tour-landing-image-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'image_path',
            'country_id',
        ],
    ]) ?>

</div>
