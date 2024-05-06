<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\GeneralPicklist */
?>
<div class="general-picklist-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'category',
        ],
    ]) ?>

</div>
