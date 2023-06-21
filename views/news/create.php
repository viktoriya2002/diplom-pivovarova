<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\News $model */

$this->title = 'Добавление новой записи';
$this->params['breadcrumbs'][] = ['label' => 'Все новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">

<div style="text-align:center"><h1><?= Html::encode($this->title) ?></h1></div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
