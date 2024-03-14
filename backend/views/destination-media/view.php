<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DestinationMedia */
?>
<div class="destination-media-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'content_text',
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
            'media_file',
            'media_type',
        ],
    ]) ?>

</div>