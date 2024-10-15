<?php

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TravellerHistory */
?>
<div class="Traveller-history-view">
	<?php //echo "<pre>";print_r($model);exit;?>
     <?= GridView::widget([
    'dataProvider' => $model,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'label' => 'Name',
            'attribute' => 'traveler_name',
            'filter' => false,
                'format' => 'raw',

            'value' => function($model){
            		return $model->traveler_name;                    
                },
        ],
        [
            'label' => 'Age',
            'attribute' => 'traveler_age',
            'filter' => false,
                'format' => 'raw',

            'value' => function($model){
            		return $model->traveler_name;                    
                },
        ],
        [
            'label' => 'Passport',
            'attribute' => 'traveler_passport',
            'filter' => false,
                'format' => 'raw',

            'value' => function($model){
            		return $model->traveler_name;                    
                },
        ]

       ],
	]); ?>

  
</div>
