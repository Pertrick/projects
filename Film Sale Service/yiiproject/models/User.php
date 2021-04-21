<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\security;


class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

  
    public static function tableName(){

        return 'users';
    }



    public function rules(){

        return [
           // ['status_id', 'default', 'value'=> self::STATUS_ACTIVE],
            [['username', 'password'], 'required'],
            [['email'], 'required'],
            [['email'],  'email'],
            [['username', 'password'], 'string', 'min' =>3, 'max' => 100],
            [['password', 'authKey', 'access_token'], 'string', 'max' => 255],
            [['email'], 'filter', 'filter' => 'trim'],
            [['username'], 'unique'],
            [['email'], 'unique'],

            ];
        
    }

      public function attributeLabels(){
        return[
        'userid' => 'Userid',
        'username' => 'Username',
        'password' => 'Password',
        'email' =>'Email',
        ];
    }



    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        

        return static::findOne(['access_token' => $token]);
    }

    public static function findByPasswordResetToken($token){
        $expire = Yii::$app->params['user.PasswordResetTokenExpire'];
        $timestamp =(int) end($parts);
        if($timestamp + $expire <time()){
            //token expire
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status_id' => self::STATUS_ACTIVE,
            ]);

    }
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        

        
        return static::findOne(['username' => $username]);
    }


   

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

   
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function generatePasswordResetToken(){
        $this->password_reset_token = Yii::$app->security->generateRandomString(). '_' . time();
    }

    public function removePasswordResetToken(){
        $this->password_reset_token = null;
    }

   
}


