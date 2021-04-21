<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Movies */

$this->title = $model->movie_name;
$this->params['breadcrumbs'][] = ['label' => 'Movies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="movies-view">

    <h1><?= Html::encode($this->title) ?></h1>
 
 <?php if(Yii::$app->user->can('admin')): ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

<?php endif; ?>

     <div class= "container" style="line-height: 2; word-spacing: 6; text-align: left; ">
    
    <div class="row">

    <div class="col-md-6">
    <?php
    
            if($model->movie_avatar != ''){
             echo '<img src="'.Yii::$app->request->baseUrl.'/images/'.$model->movie_avatar.'" class="img-responsive" style="border-radius:10px; width:100%; height:600px"  >';
            }
    
     ?>

     </div>
     <div class="col-md-6">
        <?=  $model->getEncodedDesp(); ?>
        <br>
         <?= Html::a('Buy Now', ['site/payment', 'id' => $model->id, 'user_id' =>Yii::$app->user->identity->id ], ['class' => 'btn btn-primary pull-right']) ?>
          <small>Price: $ <span style="color:green; font-size: 20px; font-weight: bold"><?=$model->price?></span></small>

   </div>

</div>
</div>
</div>
