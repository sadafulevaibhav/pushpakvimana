<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\DestinationCountry;
use common\models\TourPackage;
use mludvik\tagsinput\TagsInputWidget;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model common\models\DestinationPackage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="destination-package-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'country_id')->dropdownList(
        DestinationCountry::find()->select(['country_name', 'id'])->indexBy('id')->column(),
        ['prompt' => 'Select Country']
    ) ?>

    <?= $form->field($model, 'package_id')->dropdownList(
        TourPackage::find()->select(['package_name', 'id'])->indexBy('id')->column(),
        ['prompt' => 'Select Tour Package']
    ) ?>

    <!--
    <?= $form->field($model, 'country_id')->textInput() ?>
    <?= $form->field($model, 'package_id')->textInput() ?>
    -->

    <?= $form->field($model, 'package_name')->textInput(['maxlength' => true]) ?>

    <!--
    <?= $form->field($model, 'package_image')->textInput(['maxlength' => true]) ?>
    -->
    <?php
    // A block file picker button with custom icon and label
    echo FileInput::widget([
        'model' => $model,
        'attribute' => 'package_image',
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

    <?= $form->field($model, 'about_trip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'max_no_guests')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_breakfast')->checkbox() ?>

    <?= $form->field($model, 'is_pickupdrop_available')->checkbox() ?>

    <?= $form->field($model, 'hotel_rating')->textInput() ?>

    <?= $form->field($model, 'key_locations')->widget(TagsInputWidget::className()) ?>

    <?= $form->field($model, 'travel_expenses')->textInput() ?>


    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>