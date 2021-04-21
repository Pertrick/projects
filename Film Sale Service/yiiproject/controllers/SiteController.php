<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignUpForm;
use app\models\ContactForm;
use yii\helpers\ArrayHelper;
use app\models\User;
use app\models\ChangePassword;
use app\models\ResetPasswordForm;
use app\models\Payment;
use yii\data\ActiveDataProvider;
use app\models\Movies;
use yii\web\ForbiddenHttpException;
use yii\db\query;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'signup', 'payment'],
                'rules' => [

                        //deny all post requests
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                        
                    ],

                    //allow authenticated users
                    [
                        'allow' => true,
                        'actions' => ['payment','logout'],
                        'roles' => ['@'],
                    ],
                ],
            
            
            ],
        ];
    }

    /**
     * {@inheritdoc}
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
     * Signup action.
     *
     */




    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->setFlash('success', "Login Successful!");
            return $this->goBack();
            //Yii::$app->session->setFlash('success', "Login Successful!");
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        if($user_id = empty(Yii::$app->user->identity) ? 0: Yii::$app->user->identity);
        Yii::$app->user->logout();
        Yii::$app->session->setFlash('success', "Logout Successful!");
        return $this->goHome();
        
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
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
        return $this->render('about');
    }


    public function actionSignup(){
         $model = new SignUpForm();
        

         if($model->load(Yii::$app->request->post()) && $model->signUp()){
             
            
            return $this->redirect('index');

         }

        
        return $this->render('signup', ['model' => $model]);
       

    }


    public function actionUpdatepassword($token){
       try{
                $password = new ResetPasswordForm($token);
      
       }catch(InvalidParamException $e){
        throw new BadRequestHttpException($e->getMessage());
       }

       $form = Yii::$app->request->post();
        if($form && $password->validate() && $password->resetPassword()){

            Yii::$app->session->setFlash('success', "New Password was Saved");
            return $this->goHome();
        }


        return $this->render('updatepassword', ['password'=> $password]);
    }



public function actionPayment($id, $user_id)
{
    $model = new Payment();


    if ($model->load(Yii::$app->request->post())) {

        if($user_id == Yii::$app->user->identity->id){
         $model->user_id = Yii::$app->user->identity->id;
         $model->movie_id = $id;
        

        if ($model->validate()) {
            // form inputs are valid, do something here
            
            if($model->save()){
                Yii::$app->session->setFlash('success', "Movie Purchased Successfully");
                return $this->goHome();
            }
        }

    }else{
        throw new ForbiddenHttpException("You do not have permission");
      }
    }

    return $this->render('payment', [
        'model' => $model,

    ]);
}

public function actionViewpurchaseditem($id){

       $model = new ActiveDataProvider([
            'query' => Payment::find()->where(['user_id' => Yii::$app->user->identity->id])->joinWith('movie'),
           
        ]); 

         /*   $query = new Query();
            $query->select('card_name')
            ->from('payment')
            ->where(['user_id' => Yii::$app->user->identity->id])
            ->one();
            */
    
        //$searchModel = new ProfileSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('viewpurchaseditem', [
            //'searchModel' => $searchModel,
            'model' => $model,
        ]);
}

 
   public function actionInventory(){
        
        $action =  Movies::find()->where(['genre_id' => 1])->asArray()->all();

         $count = Payment::find()->count();

         $age = User::find()->where(['birth_date' => '<1' ])->asArray()->all();

        
        return $this->render('inventory', [
            
            'model' =>$action,
            'model2' =>$count,
            'model3' => $age,
           
        ]);
        
    }


       
    }
