<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TravelerBooking */
?>
<div class="traveler-booking-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'traveler_name',
            'traveler_age',
            'traveler_gender',
            'traveler_passport',
            'booking_date',
            'group_id',
            'package_id',
            'tour_detail_id',
        ],
    ]) ?>

</div>
