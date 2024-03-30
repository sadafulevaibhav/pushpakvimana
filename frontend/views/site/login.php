<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="loginbg">
        <div class="container">
            <div class="loginbox">
                <h2>PUSHPAKA VIMANA</h2>
                <h4>Sign In</h4>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <div class="mb-3">
                      <!-- <label class="form-label">Email</label>
                      <input type="text" class="form-control"> -->
                      <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Email') ?> 
                    </div>
                    <div class="mb-3">
                        <!-- <label class="form-label">Password</label> -->
                        <!-- <input type="password" class="form-control"> -->
                        <?= $form->field($model, 'password')->passwordInput() ?>
                        <label class="form-label"><a href="#">Forgot Password?</a></label>
                    </div>
                    <div class="signbtn-grid">
                        <?= Html::submitButton('Login', ['class' => 'signinbtn', 'name' => 'login-button']) ?>    
                    <!-- <a href="#" class="signinbtn">Sign In</a> -->
                            <div class="or">OR</div>
                        <a href="<?=Yii::$app->homeUrl.'site/signup'?>" class="signinbtn">Sign UP</a>
                        <div class="or">Login With</div>
                        <div class="socialicons"> 
                            <a href="#">
                                <img src="images/google.svg" class="img-fluid" alt="">
                            </a>

                            <a href="#">
                                <img src="images/facebook.svg" class="img-fluid" alt="">
                            </a>

                            <a href="#">
                                <img src="images/apple.svg" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
           
                </div>
<?php ActiveForm::end(); ?>

        </div>
    </div>

