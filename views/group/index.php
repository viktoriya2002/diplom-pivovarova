<?php

use app\models\Group;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\GroupSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Группы';
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['../admin/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-index">

<div style="text-align:center">
<div style="background-color: #FDF5FF; border:15px #5348b8bd ridge; maxlight:auto; padding: 5px 5px; margin:20px;">    
<h1>&#9728;Все группы&#9728;</h1>
</div></div>

    <div style="text-align:center"><p>
        <?= Html::a('Добавить новую группу', ['create'], ['style'=> 'background-color: #D972A1', 'class' => 'btn text-light']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="ta">
    <table class="table table-bordered table-warning">
        <tread>
            <tr class="table-danger">
                <th scope="col">№</th>
                <th scope="col">Название группы</th>
                <th scope="col">Возрастная категория группы</th>
                <th scope="col">Количество детей в группе (чел.)</th>
                <th></th>
            </tr>
        </tread>
        <tbody>
            <?php
            $groups = Group::find()->all();
           
            $content = '';
            $i=1;
            foreach ($groups as $group){
                $group=Group::findOne($group->id);
                $content .= "  <tr>
                <th scope='row'>{$i}</th>
                <td>{$group->name}</td>
                <td>{$group->getAge()->One()->name}</td>
                <td>{$group->number}</td>
                <td><a href='/group/update?id={$group->id}'><button class='btn btn-primary' >&#9998;</button></a>
                <a href='/group/view?id={$group->id}'><button class='btn btn-success'>&#128065;</button></a>
                
              </tr>";
                $i++;
            }
            echo $content;
            ?>
        </tbody>
    </table>
        </div></div>


</div>
