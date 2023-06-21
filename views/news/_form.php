<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\News $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="news-form">

<?php $form = \yii\bootstrap5\ActiveForm::begin();
    $li=[]; $group=\app\models\Group::find()->all();
    foreach ($group as $group)
   {
   $li[$group->id]=$group->name;
   }?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group_id')->dropDownList($li)?>

    <?= $form->field($model, 'description')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['style'=> 'background-color: #652BA9', 'class' => 'btn text-light']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
