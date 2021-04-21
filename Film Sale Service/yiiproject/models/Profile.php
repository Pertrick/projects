<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $password
 * @property string $email
 * @property string $birth_date
 * @property string $access_token
 * @property string $authKey
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'first_name', 'last_name', 'password', 'email', 'birth_date', 'access_token', 'authKey'], 'required'],
            [['username', 'first_name', 'last_name', 'password', 'email', 'access_token', 'authKey'], 'string'],
            [['birth_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'password' => 'Password',
            'email' => 'Email',
            'birth_date' => 'Birth Date',
            'access_token' => 'Access Token',
            'authKey' => 'Auth Key',
        ];
    }
}
