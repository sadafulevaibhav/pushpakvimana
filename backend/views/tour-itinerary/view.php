<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TourItinerary */
?>
<div class="tour-itinerary-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'itinerary_day',
            //'country_id',
            //'package_id',
            [
                'label' => 'Country',
                'value' => $model->country->country_name, // Display the country name
            ],
            [
                'label' => 'Package',
                'value' => $model->package->package_name, // Display the Package name
            ],
            'activities:ntext',
        ],
    ]) ?>

</div>