
<?php
use \yii\helpers\Url;
//use yii\bootstrap\Carousel;
?>

<style type="text/css">
	
	
	

	@media (min-width: 767px) {
		
		a:hover img{
		transform: scale(1.30);
		transition: transform .2s;

		box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	}
	}
	
	}


</style>


<div class="col-sm-2 ">
                <?php if($model->movie_avatar != ''){
              ?>
             <a href="<?=Url::to(['/movies/view', 'id'=>$model->id]) ?>">
             
             <?= '<img src="'.Yii::$app->request->baseUrl.'/images/'.$model->movie_avatar.'" class="img-responsive" style="margin:10px 0;" > '?>
            </a>

<?php }
?>
    </div>  


  
