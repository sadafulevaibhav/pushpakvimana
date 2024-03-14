<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AppTestimonial */
?>
<div class="app-testimonial-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'full_name',
            'designation',
            'email:email',
            'comment',
            'rating',
            'image',
            'created_by',
            'created_at',
            'updated_at',
            'updated_by',
            'company_id',
        ],
    ]) ?>

</div>
