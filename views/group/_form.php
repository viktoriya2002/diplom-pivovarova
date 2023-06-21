<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Group $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="group-form">

<?php $form = \yii\bootstrap5\ActiveForm::begin();
    $li=[]; $age_group=\app\models\AgeGroup::find()->all();
    foreach ($age_group as $age_group)
   {
   $li[$age_group->id]=$age_group->name;
   }?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age_id')->dropDownList($li) ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['style'=> 'background-color: #652BA9', 'class' => 'btn text-light']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
