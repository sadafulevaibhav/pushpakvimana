<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AboutUs */
?>
<div class="about-us-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'content',
            'created_by',
            'created_at',
            'updated_at',
            'updated_by',
            'company_id',
        ],
    ]) ?>

</div>
