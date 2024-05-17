<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Login';
?>

<div class="login-box">
    <div class="card">
        <div class="card-body login-card-body">
            <h5 class="login-box-msg"><?= $this->title ?></h5>

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['placeholder' => 'Username']) ?>

            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password']) ?>


            <div class="form-group">
                <?= $form->field($model, 'rememberMe')->checkbox(['label' => 'Remember Me']) ?>
            </div>


            <div class="form-group">
                <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>