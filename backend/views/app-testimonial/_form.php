<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\models\AppTestimonial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="app-testimonial-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'designation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'rating')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'image')->fileInput() ?> -->
    <?php
    /*
    echo $form->field($model, 'image')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]);
    */
    // A block file picker button with custom icon and label
    echo FileInput::widget([
        'model' => $model,
        'attribute' => 'image',
        'pluginOptions' => [
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'showPreview' => true,
            'browseClass' => 'btn btn-primary btn-block',
            //'browseIcon' => '<i class="fas fa-camera"></i> ',
            'browseIcon' => '<i class="bi-file-image"></i> ',
            'browseLabel' =>  'Select Image'
        ],
        //'options' => ['multiple' => false, 'accept' => 'image/*', 'allowedFileExtensions' => ['jpg']],
        'options' => ['multiple' => false, 'accept' => 'image/*'],
    ]);
    ?>

    <!-- No need to show this
    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'company_id')->textInput() ?>
     -->

    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>