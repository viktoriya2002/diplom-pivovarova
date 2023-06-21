<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AgeGroup $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="age-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['style'=> 'background-color: #652BA9', 'class' => 'btn text-light']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
