<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Child $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="child-form">

<?php $form = ActiveForm::begin();
    $li=[]; $users=\app\models\User::find()->all();
    foreach ($users as $user)
    {
        $li[$user->id]=$user->fio;
    }
    
    $mi=[]; $groups=\app\models\Group::find()->all();
    foreach ($groups as $group)
    {
        $mi[$group->id]=$group->name;
    } 
    
    ?>



    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_birth')-> Input('date')?>
    
    <?= $form->field($model, 'gender')->dropDownList([ 'М' => 'М', 'Ж' => 'Ж', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'user_id')->dropDownList($li) ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textArea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Подать заявку', ['style'=> 'background-color: #652BA9', 'class' => 'btn text-light']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
