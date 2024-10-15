<?php

use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model common\models\TourInclusionExclusion */
?>
<div class="tour-inclusion-exclusion-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'description',
            'type',
            [
                'attribute' => 'icon',
                'format' => 'html',  // Set format to 'html' to render the image tag
                'value' => function ($model) {
                    $path = Yii::getAlias('@web') . '/uploads/AddonIcon/' . $model->icon;
                    return $model->icon ? '<img src="' . $path . '" alt="Icon" style="width:50px;height:50px;">' : 'No Icon';
                },
            ],
            'country_id',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
