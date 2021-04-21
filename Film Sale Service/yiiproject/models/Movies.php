<?php

namespace app\models;

use Yii;
use \yii\helpers\Html;

/**
 * This is the model class for table "movies".
 *
 * @property int $id
 * @property int $genre_id
 * @property string $movie_name
 * @property string $movie_description
 * @property string $movie_avatar
 * @property float $price
 */
class Movies extends \yii\db\ActiveRecord
{

    public $image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'movies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['genre_id', 'movie_name', 'movie_description', 'movie_avatar', 'price'], 'required'],
            [['genre_id'], 'integer'],
            [['movie_description'], 'string'],
            [['price'], 'number'],
            [['movie_name', 'avatar_name','movie_avatar'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'genre_id' => 'Genre ID',
            'movie_name' => 'Movie Name',
            'movie_description' => 'Movie Description',
            'movie_avatar' => 'Movie Avatar',
            'price' => 'Price',
        ];
    }

     public function getUser()
    {
        return $this->hasOne(Genre::className(), ['id' => 'genre_id']);
    }

     public function getEncodedName(){
        return Html::encode($this->movie_name);
    }

    public function getEncodedDesp(){
        return Html::encode($this->movie_description);
    }
}
