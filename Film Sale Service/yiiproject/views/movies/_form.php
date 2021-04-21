<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use app\models\Genre;

/* @var $this yii\web\View */
/* @var $model app\models\Movies */
/* @var $form yii\widgets\ActiveForm */
$genres = ArrayHelper::map(Genre::find()->asArray()->all(), 'id', 'genre_name');
?>

<div class="movies-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form-> field($model, 'genre_id')->dropDownList(
            $genres, ['prompt' => '-Select movie Genre-', 'onchange' => '$.post("index.php?r=faculty/lists&id='.'"+$(this).val(), function(data){$("select#departments").html(data);
        })'

        ])->label("Movie Genre") ?>

    <?= $form->field($model, 'movie_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'movie_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

     <?= $form->field($model, 'image')->widget(FileInput::classname(), [
                
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                'allowedFileExtensions'=>['jpg', 'gif', 'png'],
                'showPreview' =>true,
                'showRemove' => true,
                'showUpload' =>true,

                ]

                ]); ?>

  

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
