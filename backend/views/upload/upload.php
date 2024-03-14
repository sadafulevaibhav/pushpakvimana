<?php

use yii\widgets\ActiveForm;
//use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'image')->fileInput() ?>

<button>Submit</button>

<?php ActiveForm::end() ?>