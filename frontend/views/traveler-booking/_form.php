<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TravelerBooking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="traveler-booking-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'traveler_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'traveler_age')->textInput() ?>
    <?= $form->field($model, 'traveler_gender')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'traveler_passport')->textInput(['maxlength' => true]) ?>
    <!--
    <?= $form->field($model, 'booking_date')->textInput() ?>
    <?= $form->field($model, 'group_id')->textInput() ?>
    <?= $form->field($model, 'package_id')->textInput() ?>
    <?= $form->field($model, 'tour_detail_id')->textInput() ?>
    -->

    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>