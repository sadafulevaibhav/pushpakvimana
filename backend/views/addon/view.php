<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Addon */
?>
<div class="addon-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'icon_image',
            'title',
        ],
    ]) ?>

</div>
