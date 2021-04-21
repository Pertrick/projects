<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TodoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="todo-index" style="background-color: #fff; padding:20px; color:#000222;">

    <h1><?= Html::encode($this->title) ?></h1>

   <!-- <p>
        <?= Html::a('Create Todo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $model,
       // 'filterModel' => $searchModel,
        'showOnEmpty' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
              'attribute' => 'movie names',
              'value' => function($model){
                          if($model->movie->movie_name){
                            return $model->movie->movie_name;
                          }
              }
              ],

              [

              'attribute' => 'movies',
              'value' => function($model){
                          
                           return '<img src="'.Yii::$app->request->baseUrl.'/images/'.$model->movie->movie_avatar.'" class="img-responsive" style="width:50px; height: 50px" >' ;
                          
              }
            ],

              [

              'attribute' => 'status',
              'value' => function($model){
                          return 'Paid';
              }
              
            ],



           
            
        ],
    ]); ?>


</div>
