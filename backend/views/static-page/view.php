<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StaticPage */
?>
<div class="static-page-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'heading',
            'description:ntext',
            'seo_title',
            'seo_keywords',
            'seo_description:ntext',
        ],
    ]) ?>

</div>
