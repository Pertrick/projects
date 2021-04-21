<?php

//use slavkovrn\imagecarousel\imageCarouselWidget;
use coderius\swiperslider\SwiperSlider;
use yii\bootstrap\Carousel;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<style type="text/css">
    
   .row img{
    border-radius: 12px !important;
}

a.genre{
    display: block;
    text-align: center !important;
    letter-spacing: 3px;
    font-size: 2rem;
    margin: 1.4% 0;
}


</style>


<div class="hold">

<?=
    Carousel::widget([
        'items' =>[ 
                
                '<img src="images/hamburger-and-fries-photo-2983101.jpg" class="img-responsive" style="width:100%; height:400px;"/>',
                '<img src="images/man-and-woman-wearing-black-and-white-striped-aprons-2696064.jpg" class="img-responsive" style=" width:100%;  height:400px; "  />',
                '<img src="images/photo-of-steak-and-french-fries-on-gray-plate-3535383.jpg" class="img-responsive" style=" width:100%;  height:400px;"  />'


        ]]);

?>

</div>




<div class="site-index">

   <a href=""  class="genre">Action</a>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
             <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
             <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
            <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
             <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
             <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
        </div>

    </div>


     <a href="" class="genre"> Comedy</a>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
             <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
             <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
            <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
             <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
             <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
        </div>

    </div>


     <a href="" class="genre">Horror</a>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
             <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
             <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
            <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
             <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
             <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
        </div>

    </div>

    <a href="" class="genre">Drama</a>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
             <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
             <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
            <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
             <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
             <div class="col-sm-2">
            <img src="images/bg.jpg" class="img-responsive">
            </div>
        </div>

    
           <a href="" style="display: block; text-align:center; margin:2%;" >see all Genres</a>
    
</div>
