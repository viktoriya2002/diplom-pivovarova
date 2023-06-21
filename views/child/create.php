<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Child $model */

$this->title = 'Новая заявка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="child-create">

<div style="text-align:center"> <h1><?= Html::encode($this->title) ?></h1></div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
