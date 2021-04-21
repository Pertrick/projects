<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index" style="color:#012345; background-color: #fff !important; padding: 18px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>
        <?= Html::a('Create Profile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'itemView' => '_profile_item',
    ]); ?>


</div>
