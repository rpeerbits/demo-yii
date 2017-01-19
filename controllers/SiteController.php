<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\User;
use app\models\Users;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','index'],
                'rules' => [
                    [
                        'actions' => ['logout','index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            //'verbs' => [
            //    'class' => VerbFilter::className(),
            //    'actions' => [
            //        'logout' => ['post'],
            //    ],
            //],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        
        $this->layout = 'login';
        //print_r(\Yii::$app->user->isGuest); die;
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $model = new LoginForm();
        $user = new Users();
        
        
        if($model->load(Yii::$app->request->post()) && $model->login())
        {
            if(isset($_POST['LoginForm']['rememberMe']) && $_POST['LoginForm']['rememberMe'] =="1")
            {
                $cookies = Yii::$app->response->cookies;
                // add a new cookie to the response to be sent
                
                $no = rand(1,9);
                
                $v1 = $_POST['LoginForm']['username'];
                $v2 = $_POST['LoginForm']['password'];
                
                for($i=1;$i<=$no;$i++){
                    $v1 = base64_encode($v1);
                    $v2 = base64_encode($v2);
                }
                
                $cookies->add(new \yii\web\Cookie([
                    'name' => Yii::$app->params['appcookiename'].'username',
                    'value' => $v1,
                ]));
                
                $cookies->add(new \yii\web\Cookie([
                    'name' => Yii::$app->params['appcookiename'].'password',
                    'value' => $v2,
                ]));
                
                $cookies->add(new \yii\web\Cookie([
                    'name' => Yii::$app->params['appcookiename'].'turns',
                    'value' => $no,
                ]));
            }else{
                

            }
            Yii::$app->session->set('logtime', time());
            
            return $this->goBack();
        } else {
          //echo 'dfs';die;
            if($model->load(Yii::$app->request->post()))
            {
                $msg = "username or password are wrong";
                
                \Yii::$app->getSession()->setFlash('flash_msg', $msg);
            }
            return $this->render('login', [
                'model' => $model,
                'user'=>$user,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $this->layout = 'login';
        return $this->render('about');
    }
    
    public function actionSay($message = 'Hello')
    {
        return $this->render('say', ['message' => $message]);
    }
}
