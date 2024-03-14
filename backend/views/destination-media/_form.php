<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\DestinationCountry;
use common\models\TourPackage;

/* @var $this yii\web\View */
/* @var $model common\models\DestinationMedia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="destination-media-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'content_text')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'media_file')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'media_type')->textInput(['maxlength' => true]) ?>


    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>