<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StaticPage */

$this->title = $model->seo_title;
$this->registerMetaTag(['name' => 'keywords', 'content' => $model->seo_keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $model->seo_description]);
?>
<div class="static-page-view">
    <h1><?= Html::encode($model->heading) ?></h1>
    <?= $model->description ?>
</div>