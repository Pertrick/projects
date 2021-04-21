<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

class SignUpForm extends Model{

	public $username;
	public $first_name;
	public $last_name;
	public $email;
	public $password;
	public $birth_date;
	public $password_repeat;
	public $password_reset_token;


	public function rules(){
		return[
			[['username', 'first_name', 'last_name','password', 'password_repeat'], 'required'],
			[['birth_date'], 'required'],
			[['email'], 'required'],
			[['username','email'], 'filter', 'filter' => 'trim'],
			[['email'],'email'],
			[['birthday'], 'safe'],
			[['username'], 'string', 'min'=>3, 'max'=>20],
			[['first_name', 'last_name'], 'string', 'min'=>1, 'max'=>25],
			[['password','password_repeat'], 'string', 'min'=>8, 'max'=>255],
			[['password_repeat'], 'compare', 'compareAttribute' =>'password'],
			[['username'], 'unique','targetClass' => '\app\models\User',
				'message' => 'This username has already been taken.'],
			[['email'], 'unique','targetClass' => '\app\models\User',
				'message' => 'This email has already been taken.']



		];
	}

	


	public function signUp(){
		if($this->validate()){
			$user = new User();
			$user->username = $this->username;
			$user->first_name = $this->first_name;
			$user->last_name = $this->last_name;
			$user->email = $this->email;
			$user->password = \Yii::$app->security->generatePasswordHash($this->password); 
			$user->access_token = \Yii::$app->security->generateRandomString();
			$user->authKey  = \Yii::$app->security->generateRandomString();
			$user->birth_date = $this->birth_date;
			
			
			if($user->save()){
				Yii::$app->session->setFlash('success', "Sign up Successful!");
				return true;
			}
			Yii::$app->session->setFlash('danger',"Sign up FAILED!");
			\Yii::error("User was not saved". var_dump($user->errors));

			
		    return false;
	  }

	  return null;

  }



}

