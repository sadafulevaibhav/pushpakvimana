<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Activities */
?>
<div class="activities-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'activity_name',
            'activity_price',
            'activity_icon',
            'country_id',
        ],
    ]) ?>

</div>
