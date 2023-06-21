<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Menu $model */

$this->title = 'Добавление';
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-create">

<div style="text-align:center"><h1><?= Html::encode($this->title) ?></h1></div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
