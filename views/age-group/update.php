<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AgeGroup $model */

$this->title = 'Редактирование категории: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Все категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="age-group-update">

<div style="text-align:center">   
<h1><?= Html::encode($this->title) ?></h1>
</div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
