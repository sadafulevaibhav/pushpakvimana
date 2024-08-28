<?php

/** @var yii\web\View $this */
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\StaticPage $model */

use yii\captcha\Captcha;
use yii\bootstrap5\Html;
// use yii\helpers\Html;

$this->title = $model->heading;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about pt-3" >
    <div class="container">
    <div class="row">
        <div class="col align-self-center">
            <h1 style="margin-top: 15px;"><?= Html::encode($model->heading) ?></h1>
            <?php echo stripslashes($model->description); ?>
        </div>
    </div>
    </div>
    
</div>
