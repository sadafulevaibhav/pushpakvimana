<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\GeneralPicklist;
use kartik\date\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\TourEnquiries */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tour-enquiries-form">

    <?php $form = ActiveForm::begin([
        'id' => 'enquiry-form',
        'enableClientValidation' => true,
    ]); ?>
    <div class="row">
        <div class="col-md-12 enq-section-1">
            <!-- Content for Section 1 -->
            <?= $form->field($model, 'full_name')->textInput(['maxlength' => true, 'placeholder' => "Full Name"])->label(false) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => "Email"])->label(false) ?>
            <?= $form->field($model, 'mobile')->textInput(['maxlength' => true, 'placeholder' => "Phone Number"])->label(false) ?>
            <?= $form->field($model, 'whats_app')->textInput(['maxlength' => true, 'placeholder' => "WhatsApp"])->label(false) ?>
        </div>

        <div class="col-md-12 enq-section-2">
            <!-- Content for Section 2 -->
            <?= $form->field($model, 'travel_destination')->textInput(['maxlength' => true, 'placeholder' => "Travel Destination"])->label(false) ?>
            <?= $form->field($model, 'travel_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Travel Date'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ])->label(false); ?>
            <?= $form->field($model, 'travellers_count')->textInput(['type' => 'number', 'placeholder' => "No. of people"])->label(false) ?>
            <!--
            <?= $form->field($model, 'vacation_type')->textInput(['maxlength' => true, 'placeholder' => "Vacation Type"])->label(false) ?>
            -->
            <?= $form->field($model, 'vacation_type')->widget(Select2::classname(), [
                'data' => GeneralPicklist::find()
                    ->select(['name', 'id'])
                    ->where(['category' => 'Vacation Type'])
                    ->indexBy('id')
                    ->column(),
                'options' => ['placeholder' => 'Vacation Type'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label(false); ?>

        </div>
    </div>

    <!--
        <?= $form->field($model, 'travel_date')->textInput() ?>
        <?= $form->field($model, 'created_date')->textInput() ?>
    -->

    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>