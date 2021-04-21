<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <style>
    .navbar-brand, .navbar .nav{text-transform: uppercase; letter-spacing: 2px;  font-size:12px !important; }
    .navbar-inverse{background-color: #000222 !important; padding-top: 1px !important;}
    
    .navbar-nav>li>a{ font-size:9px !important;}
    .navbar-inverse .navbar-nav>.active>a:hover,
    .navbar-inverse .navbar-nav>li>a:hover,
    .navbar-inverse .navbar-nav>li>a:focus{ background-color: transparent !important; text-decoration: underline; }
    .navbar-inverse .navbar-nav>.active>a{text-decoration: underline; background-color: transparent !important; }

        .dropdown-menu > li>a{
        font-size: 10px;
    }
    .dropdown-menu > li>a:hover, 
    .dropdown-menu > li>a:focus{
        background-color: #000222 !important; color: #fff !important; font-size: 10px;
    }

   
    .btn{padding: 12px 25px !important; letter-spacing: 2.5px;}
    .btn:focus, .btn:active:focus, .btn.active:focus{ outline: 0 none !important; }
    .color{background-color: #000222 !important; color:#fff !important;}

    </style>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap  color">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
   ]);
   
         $menuItems = [
            ['label' => 'Home', 'url' => ['/movies/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']]];
             if(Yii::$app->user->isGuest){
              $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
              $menuItems[] = ['label' => 'Sign up', 'url' => ['/site/signup']];
    }else if(Yii::$app->user->can('admin')){
        $menuItems[] = [
            'label' => 'Account', 
            'items' => [

                [
                'label'=> 'Profile', 'url' => ['/profile/index']
                ], 

                
                 [
               
                'label'=> 'Inventory', 'url' => ['/site/inventory']
                ], 
                
                [
                'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
                ],
            ],
        ];
            
            }

            else{
        $menuItems[] = [
            'label' => 'Account', 
            'items' => [

                [
                'label'=> 'Profile', 'url' => ['/profile/index']
                ], 

                
                [
                'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
                ],
            ],
        ];

           

            
            }
            
           /*Yii::$app->user->isGuest ? (
             ['label' => 'Login', 'url' => ['/site/login']]

            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'nav btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);*/
             echo Nav::widget([
               'options' => ['class' => 'navbar-nav navbar-right'],
               'items' => $menuItems,
             ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Film Sales Service <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
