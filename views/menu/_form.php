<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Menu $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'day')->dropDownList([ 'Пн' => 'Понедельник', 
    'Вт' => 'Вторник', 'Ср' => 'Среда', 'Чт' => 'Четверг', 'Пт' => 'Пятница', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'breakfast')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'second_br')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lunch')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dinner')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['style'=> 'background-color: #652BA9', 'class' => 'btn text-light']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
