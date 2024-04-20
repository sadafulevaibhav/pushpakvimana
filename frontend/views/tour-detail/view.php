<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TourDetail */
?>
<div class="tour-detail-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tour_start_date',
            'tour_end_date',
            'tour_origin',
            'tour_destination',
            'package_id',
        ],
    ]) ?>

</div>
