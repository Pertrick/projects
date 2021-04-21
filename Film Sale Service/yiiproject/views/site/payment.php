<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Payment */
/* @var $form ActiveForm */
?>

<style type="text/css">
    

    @media (min-width: 767px) {
        
        div.payment{color:#000222; 
            background-color: #fff !important; 
            padding: 18px;
            margin:10px 70px;
            border-radius: 15px;
    }
    }
    
    }
</style>
<div class="payment" ">

        <p style="text-align: center; font-size: 20px;">Payment</p>

    <?php $form = ActiveForm::begin(); ?>

        
        <?= $form->field($model, 'card_name') ?>
        <?= $form->field($model, 'card_number') ?>
        <?= $form->field($model, 'month') ?>
        <?= $form->field($model, 'year') ?>
        <?= $form->field($model, 'cvv') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- payment -->
