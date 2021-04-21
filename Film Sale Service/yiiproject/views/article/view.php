<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */




$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="text-muted">
    <small>Created: <b><?= Yii::$app->formatter->asRelativetime($model->created_at) ?></b>

    <p>By: <b><?= $model->createdBy->username; ?></b></p>

    </small>
      
    </p>

    <?php if(!Yii::$app->user->isGuest):?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this User?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

  <?php endif; ?>

    
    
       <?= Html::img('@web/images/bg.jpg', ['class' =>'img-responsive']); ?>

    
   <div style="line-height: 3; word-spacing: 6; text-align: justify; ">
    
       <?=  $model->getEncodedBody(); ?>
   </div>

</div>
