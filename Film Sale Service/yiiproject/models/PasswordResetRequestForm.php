<?php
  namespace app\models;

  use Yii;
  use yii\base\model;
  use app\models\User;


  class PasswordResetRequestForm extends Model{

  	public $email;

  	public function rules(){
  		return[
  				['email','filter','filter'=>'trim'],
  				['email', 'required'],
  				['email', 'exist',
  				'targetClass' => '\app\models\User','filter' => ['status' => User::STATUS_ACTIVE],
  				'message' => 'There is no user with such email'],

  		];
  	}

  	public function sendEmail(){

  		$user = User::findOne([
  			'status_id'=>User::STATUS_ACTIVE,
  			'email' => $this->email,
  			]);

  		if($user){
  			$user->generatePasswordResetToken();
  			if($user->save()){

  				return \Yii::$app->mailer->compose('passwordResetToken',
				['user' => $user])
				->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
				->setTo($this->email)
				->setSubject('Password reset for ' . \Yii::$app->name)
				->send();
  			}
  		}

  		return false;
  	}


  



}

