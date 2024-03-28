<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DestinationPackage */

?>
<div class="destination-package-create">
    <?= $this->render('_form', [
        'model' => $model,
        'addonList' => $addonList,
    ]) ?>
</div>