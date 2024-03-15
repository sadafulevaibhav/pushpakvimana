<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DestinationPackage */
?>
<div class="destination-package-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'package_name',
            'package_image',
            'about_trip',
            'max_no_guests',
            //'is_breakfast',
            //'is_pickupdrop_available',
            /*
            [
                'attribute' => 'is_breakfast',
                'value' => function ($model) {
                    return $model->is_breakfast ? 'Yes' : 'No';
                },
            ],
            [
                'attribute' => 'is_pickupdrop_available',
                'value' => function ($model) {
                    return $model->is_pickupdrop_available ? 'Yes' : 'No';
                },
            ],
            */
            'hotel_rating',
            'key_locations:ntext',
            'travel_expenses',
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
        ],
    ]) ?>

</div>