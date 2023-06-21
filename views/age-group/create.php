<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AgeGroup $model */

$this->title = 'Создание новой категории';
$this->params['breadcrumbs'][] = ['label' => 'Все категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="age-group-create">

<div style="text-align:center"> 
<h1><?= Html::encode($this->title) ?></h1>
</div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
