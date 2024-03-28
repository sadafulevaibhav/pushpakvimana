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

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

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
    <?= $form->field($model, 'media_file')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'media_type')->textInput(['maxlength' => true]) ?>
    -->

    <?php
    $mediaTypeOptions = [
        'image' => 'Image',
        'video' => 'Video',
    ];
    $mediaType = $model->isNewRecord ? 'image' : $model->media_type;
    ?>

    <?= $form->field($model, 'media_type')->dropDownList($mediaTypeOptions, ['id' => 'media-type-select']) ?>

    <div id="media-file-container">
        <?php if ($mediaType == 'image') : ?>
            <?= $form->field($model, 'media_file')->fileInput(['accept' => 'image/*']) ?>
        <?php else : ?>
            <?= $form->field($model, 'media_file')->fileInput(['accept' => 'video/*']) ?>
        <?php endif; ?>
    </div>

    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<<JS
    $('#media-type-select').on('change', function() {
        var mediaType = $(this).val();
        var fileInput = $('#destinationmedia-media_file');
        var fileContainer = $('#media-file-container');

        fileContainer.empty();

        if (mediaType === 'image') {
            fileInput = $('<input type="file" name="DestinationMedia[media_file]" accept="image/*">');
        } else {
            fileInput = $('<input type="file" name="DestinationMedia[media_file]" accept="video/*">');
        }

        fileContainer.append(fileInput);
    });
JS;
$this->registerJs($script);
?>