<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\DestinationCountry;
use kartik\file\FileInput;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\TourLandingImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tour-landing-image-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'country_id')->dropdownList(
		DestinationCountry::find()->select(['country_name', 'id'])->indexBy('id')->column(),
		['prompt' => 'Select Country']
	) ?>

	<?php
	// A block file picker button with custom icon and label
	echo FileInput::widget([
		'model' => $model,
		'attribute' => 'image_path',
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

	<?php if (!Yii::$app->request->isAjax) { ?>
		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
	<?php } ?>

	<?php ActiveForm::end(); ?>

</div>