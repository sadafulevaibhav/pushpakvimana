<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TourDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tour-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tour_start_date')->textInput() ?>

    <?= $form->field($model, 'tour_end_date')->textInput() ?>

    <?= $form->field($model, 'tour_origin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tour_destination')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'package_id')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
