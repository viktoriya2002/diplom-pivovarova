<?php

use app\models\AgeGroup;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AgeGroupSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['../admin/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="age-group-index">

<div style="text-align:center">
<div style="background-color: #FDF5FF; border:15px #5348b8bd ridge; maxlight:auto; padding: 5px 5px; margin:20px;">    
<h1>&#9883;Возрастные категории групп&#9883;</h1>
</div>
</div>

<div style="text-align:center">
<p>
        <?= Html::a('Добавить новую возрастную категорию', ['create'], ['style'=> 'background-color: #D972A1', 'class' => 'btn text-light']) ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="ta">
    <table class="table table-bordered table-warning">
        <tread>
            <tr class="table-danger">
                <th scope="col">№</th>
                <th scope="col">Название категории</th>
                <th></th>
            </tr>
        </tread>
        <tbody>
            <?php
            $age_groups = AgeGroup::find()->all();
           
            $content = '';
            $i=1;
            foreach ($age_groups as $age_group){
                $age_group=AgeGroup::findOne($age_group->id);
                $content .= "  <tr>
                <th scope='row'>{$i}</th>
                <td>{$age_group->name}</td>
                <td><a href='/age-group/update?id={$age_group->id}'><button class='btn btn-primary' >&#9998;</button></a>
                <a href='/age-group/view?id={$age_group->id}'><button class='btn btn-success'>&#128065;</button></a>
                
              </tr>";
                $i++;
            }
            echo $content;
            ?>
        </tbody>
    </table>
        </div></div>


</div>
