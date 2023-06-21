<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Child $model */

$this->title = $model->fio;
$this->params['breadcrumbs'][] = ['label' => 'Список всех детей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="child-view">

<div style="text-align:center">
<div style="background-color: #FDF5FF; border:15px #5348b8bd ridge; maxlight:auto; padding: 5px 5px; margin:20px;"> 
    <h1>&hearts;<?= Html::encode($this->title) ?>&hearts;</h1>
</div></div>

<div style="text-align:center"><p>
        <?= Html::a('Редактирование', ['update', 'id' => $model->id], ['style'=> 'background-color: #6093DD', 'class' => 'btn text-light']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'style'=> 'background-color: #D22D63',
            'class' => 'btn text-light',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить аккаунт?',
                'method' => 'post',
            ],
        ]) ?>
    </p></div>

    <div style="text-align:center"><?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'fio',
            'date_birth',
            'gender',
            ['attribute'=>'Группа', 'value'=> function($data){return $data->getGroup()->One()->name;}],
            ['attribute'=>'ФИО родителя', 'value'=> function($data){return $data->getUser()->One()->fio;}],
            'adress',
            'description',
            'status',
        ],
    ]) ?></div>

</div>
