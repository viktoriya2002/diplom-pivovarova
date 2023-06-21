<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Child $model */

$this->title = 'Редактирование аккаунта: ' . $model->fio;
$this->params['breadcrumbs'][] = ['label' => 'Список всех детей', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fio, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="child-update">

<div style="text-align:center"> <h1><?= Html::encode($this->title) ?></h1></div>

    <?= $this->render('_form copy', [
        'model' => $model,
    ]) ?>

</div>
