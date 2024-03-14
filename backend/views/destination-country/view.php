<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DestinationCountry */
?>
<div class="destination-country-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'country_code',
            'country_name',
            'destination_media',
        ],
    ]) ?>

</div>
