<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TourEnquiries */
?>
<div class="tour-enquiries-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'full_name',
            'email:email',
            'mobile',
            'whats_app',
            'travel_destination',
            'travel_date',
            'travellers_count',
            'vacation_type',
            'created_date',
        ],
    ]) ?>

</div>