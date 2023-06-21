<?php

use app\models\Child;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ChildSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Дети';
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['../admin/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="child-index">

<div style="text-align:center">
<div style="background-color: #FDF5FF; border:15px #5348b8bd ridge; maxlight:auto; padding: 5px 5px; margin:20px;"> 
    <h1>&diams;Список всех детей&diams;</h1>
</div></div>

    <div style="text-align:center"><p>
        <?= Html::a('Добавить ребенка', ['create'], ['style'=> 'background-color: #D972A1', 'class' => 'btn text-light']) ?>
        <a href="/child/child"><button type="button" style= "background-color: #E6738C" class="btn text-light">Список заявок для пользователей</button></a>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="ta">
<table class="table table-bordered table-warning">
        <tread>
            <tr class="table-danger">
                <th scope="col">№</th>
                <th scope="col">ФИО ребенка</th>
                <th scope="col">Дата рождения</th>
                <th scope="col">Пол</th>
                <th scope="col">Группа</th>
                <th scope="col">ФИО родителя</th>
                <th scope="col">Адрес</th>
                <th scope="col">Доп. информация</th>
                <th scope="col">Статус</th>
                <th></th>
            </tr>
        </tread>
        
        <tbody>
            <?php
            $childs = Child::find()->all();
            $content = '';
            $i=1;
            foreach ($childs as $child){
                $menu=Child::findOne($child->id);
                $content .= "  <tr>
                <th scope='row'>{$i}</th>
                <td>{$child->fio}</td>
                <td>{$child->date_birth}</td>
                <td>{$child->gender}</td>
                <td>{$child->getGroup()->One()->name}</td>
                <td>{$child->getUser()->One()->fio}</td>
                <td>{$child->adress}</td>
                <td>{$child->description}</td>
                <td>{$child->status}</td>
                <td><a href='/child/update?id={$child->id}'><button class='btn btn-primary' >&#9998;</button></a>
                <a href='/child/view?id={$child->id}'><button class='btn btn-success'>&#128065;</button></a>
                
              </tr>";
                $i++;
            }
            echo $content;
            ?>
        </tbody>
    </table>
        </div></div>

</div>
