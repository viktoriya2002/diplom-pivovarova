<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Menu $model */

$this->title = $model->day;
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="menu-view">

<div style="text-align:center">
<div style="background-color: #FDF5FF; border:15px #5348b8bd ridge; maxlight:auto; padding: 5px 5px; margin:20px;">
<h1><?= Html::encode($this->title) ?></h1>
</div>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['style'=> 'background-color: #6093DD', 'class' => 'btn text-light']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'style'=> 'background-color: #D22D63',
            'class' => 'btn text-light',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить данный день недели?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
        </div>
        <div style="text-align:center"><?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'day',
            'breakfast',
            'second_br',
            'lunch',
            'dinner',
        ],
    ]) ?></div>

</div>
