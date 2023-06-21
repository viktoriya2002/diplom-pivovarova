<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Menu $model */

$this->title = 'Редактирование дня недели: ' . $model->day;
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->day, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="menu-update">

<div style="text-align:center"><h1><?= Html::encode($this->title) ?></h1></div>

    <?= $this->render('_form copy', [
        'model' => $model,
    ]) ?>

</div>
