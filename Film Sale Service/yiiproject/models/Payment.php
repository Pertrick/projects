<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property int $user_id
 * @property int $movie_id
 * @property string $card_name
 * @property string $card_number
 * @property string $month
 * @property string $year
 * @property string $cvv
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'movie_id', 'card_name', 'card_number', 'month', 'year', 'cvv'], 'required'],
            [['user_id', 'movie_id'], 'integer'],
            [['card_name', 'card_number', 'month', 'year', 'cvv'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'movie_id' => 'Movie ID',
            'card_name' => 'Card Name',
            'card_number' => 'Card Number',
            'month' => 'Month',
            'year' => 'Year',
            'cvv' => 'Cvv',
        ];
    }


     public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getMovie()
    {
        return $this->hasOne(Movies::className(), ['id' => 'movie_id']);
    }
}
