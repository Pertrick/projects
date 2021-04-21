<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profile-view" style="color:#000222; background-color: #fff !important; padding: 20px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update Profile', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        
         
         <?= Html::a('Orders', ['/site/viewpurchaseditem', 'id' => $model->id], [
            'class' => 'btn btn-success pull-right',
            
        ]) ?>


        <?php if (Yii::$app->user->can('admin')): ?>
          
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this User?',
                'method' => 'post',
            ],
        ]) ?>

    <?php endif;?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username:ntext',
            'first_name:ntext',
            'last_name:ntext',
            'password:ntext',
            'email:ntext',
            'birth_date',
            
        ],
    ]) ?>

    

</div>
