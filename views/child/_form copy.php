<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Child $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="child-form">

<?php $form = ActiveForm::begin();
    $li=[]; $groups=\app\models\Group::find()->all();
    foreach ($groups as $group)
    {
        $li[$group->id]=$group->name;
    } 
    ?>

    <?= $form->field($model, 'group_id')->dropDownList($li) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'В ожидании' => 'В ожидании', 'Зачислен' => 'Зачислен', 'Отклонен'=>'Отклонен'], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['style'=> 'background-color: #652BA9', 'class' => 'btn text-light']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
