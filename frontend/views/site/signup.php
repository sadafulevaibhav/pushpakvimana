<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use PhpParser\Node\Stmt\Label;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Signup';
// echo "<pre>";print_r($model);exit;
?>

<div class="signupbg">
        <div class="container">
            <div class="loginbox">
                <h2>PUSHPAKA VIMANA</h2>
                <h4>Sign Up</h4>
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <div class="mb-3 nameinfobox">
                        <div class="nameinfo firsname">
                            <?= $form->field($model, 'title')->textInput(['autofocus' => true]); ?>
                        </div>

                        <div class="nameinfo">
                            <?= $form->field($model, 'firstname')->textInput(['autofocus' => true]) ?>
                        </div>

                        <div class="nameinfo">
                        <?= $form->field($model, 'lastname')->textInput(['autofocus' => true]) ?>
                        </div>
                        
                      </div>
                    <div class="mb-3">
                        <?= $form->field($model, 'email')->label('Your Email Address') ?>
                    </div>

                    <div class="mb-3">
                       <?= $form->field($model, 'mobile') ?>
                    </div>

                    <div class="mb-3">
                        <?= $form->field($model, 'password')->passwordInput() ?>
                    </div>

                    <div class="mb-3">
                        <?= $form->field($model, 'rpassword')->passwordInput()->label('Confirm Password') ?>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            I would like to be kept informed of special Promotions and offers. 
                            I hereby accept the <a href="#">Privacy Policy</a> authorize pushpaka vimana to contact me.
                        </label>
                      </div>

                    <div class="signbtn-grid">
                        <?= Html::submitButton('Register', ['class' => 'signinbtn', 'name' => 'signup-button']) ?>    
                       <div class="or">Already have an account?</div>
                        <a href="<?=Yii::$app->homeUrl.'site/login'?>" class="signinbtn">Log in</a>                        
                    </div>
                    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>