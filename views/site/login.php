<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = Yii::$app->params['apptitle'].' : Login To Your Account';
$this->params['breadcrumbs'][] = $this->title;


$cookies = Yii::$app->request->cookies;
// get the cookie value 
$username = $cookies->getValue(Yii::$app->params['appcookiename'].'username');
//return default value if the cookie is not available
$password = $cookies->getValue(Yii::$app->params['appcookiename'].'password');
$no = $cookies->getValue(Yii::$app->params['appcookiename'].'turns');

for($i=1;$i<=$no;$i++){
	$username = base64_decode($username);
	$password = base64_decode($password);
}


if($username){$model->username = $username;}
if($password){$model->password = $password;}
if($username){$model->rememberMe = true;}


?>
<!--<div class="site-login">-->
    <!--<h1><?//= Html::encode($this->title) ?></h1>-->
<!--<h3 class="form-title"><?= Html::encode($this->title) ?></h3>-->
    <!--<p>Please fill out the following fields to login:</p>-->

    <!--<form class="form-signin" action="index.html">-->
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-signin'],
            //'fieldConfig' => [
            //    //'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            //    //'labelOptions' => ['class' => 'col-lg-1 control-label'],
            //],
        ]); ?>
        
        <h2 class="form-signin-heading" style="background: #fff;" >
            <?php echo Html::img('@web/img/logo.png',array("style"=>'width:100px;margin-right:10px;'));?>
            <span style="color:#FF6C60;"><?php echo Yii::$app->params['apptitle']; ?></span>
        </h2>
        <div class="login-wrap">
            <?php
                echo \Yii::$app->getSession()->getFlash('flash_msg');
            ?>
            <?= $form->field($model, 'username',['inputOptions'=>array('placeholder'=>'User Name')])->label(false); ?>    
            <?= $form->field($model, 'password',['inputOptions'=>array('placeholder'=>'Password')])->passwordInput()->label(false); ?>
            
            
            <?php echo $form->field($model, 'rememberMe', ['template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>",    ])->checkbox(); ?>

                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
                </span>
                <br>
            <!--<button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>-->
            <?= Html::submitButton('Sign in', ['class' => 'btn btn-lg btn-login btn-block', 'name' => 'login-button']) ?>


        </div>
      <?php ActiveForm::end(); ?>
</script>