<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\TourPackage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tour-package-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'package_name')->textInput(['maxlength' => true]) ?>

	<?php
	// A block file picker button with custom icon and label
	echo FileInput::widget([
		'model' => $model,
		'attribute' => 'package_media',
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