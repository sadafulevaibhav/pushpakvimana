<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\DestinationCountry;
use common\models\TourPackage;
use mludvik\tagsinput\TagsInputWidget;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model common\models\TourItinerary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tour-itinerary-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'itinerary_day')->textInput(['maxlength' => true]) ?>

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
    <?= $form->field($model, 'activities')->textarea(['rows' => 6]) ?>
    -->

    <?= $form->field($model, 'activities')->widget(TagsInputWidget::className()) ?>

    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>