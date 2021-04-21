<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\bootstrap\Carousel;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MoviesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Movies';
//$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
    
   .row img{
    border-radius: 15px !important;
}

a.genre{
    display: block;
    text-align: center !important;
    letter-spacing: 3px;
    font-size: 1.5rem;
    margin: 1.4% auto;
    border:1.5px solid #fff;
    border-radius: 5px;
   padding:0 0;
}


.item{
      height:500px;
}

a{
  color:#fff;
}

a:hover{
  color:#fff;
}

.site a{
  margin:25px 0;
}

</style>

<div class="movies-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

 <?php if(Yii::$app->user->can('admin')): ?>
    <p>
        <?= Html::a('Add Movies', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

     <?php endif;?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="site">


  <?=
    Carousel::widget([
        'items' =>[ 
                
                '<img src="images/dry_ver2_xlg.jpg" class="img-responsive" style="width:100%; border-radius:10px"/>',
                '<img src="images/occupation_rainfall_xlg.jpg" class="img-responsive" style=" width:100%;   border-radius:10px"  />',
                '<img src="images/vanquish_xlg.jpg" class="img-responsive" style=" width:100%; border-radius:10px"  />',

                 


        ]
        ]);

?>

   <a href=""  class="genre border">Action</a>
    <div class="container">
       <div class="row ">
      

    <?= ListView::widget([
        'dataProvider' => $dataProvider1,
        //'filterModel' => $searchModel,
        'itemView'=> '_movie_item',

       
        
    ]); ?>

      </div>
     </div>
    

    <a href=""  class="genre border">Horror</a>
    <div class="container">
       <div class="row ">
      

    <?= ListView::widget([
        'dataProvider' => $dataProvider2,
        //'filterModel' => $searchModel,
        'itemView'=> '_movie_item',
       
        
    ]); ?>

      </div>
     </div>

      <a href=""  class="genre border">Cartoons</a>
    <div class="container">
       <div class="row ">
      

     <?= ListView::widget([
        'dataProvider' => $dataProvider6,
        //'filterModel' => $searchModel,
        'itemView'=> '_movie_item',
       
        
    ]); ?>

      </div>
     </div>

      <a href=""  class="genre border">Drama</a>
    <div class="container">
       <div class="row ">
      

    <?= ListView::widget([
        'dataProvider' => $dataProvider4,
        //'filterModel' => $searchModel,
        'itemView'=> '_movie_item',
       
        
    ]); ?>

      </div>
     </div>


     
      <a href="#"  style="font-size: small; display: block; text-align: center;">See More Movies</a>
</div>

</div>
