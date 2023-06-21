<?php

use app\models\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MenuSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Меню';
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['../admin/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

<div style="text-align:center">
<div style="background-color: #FDF5FF; border:15px #5348b8bd ridge; maxlight:auto; padding: 5px 5px; margin:20px;">    
<h1>&#9749;<?= Html::encode($this->title) ?>&#9749;</h1>
</div></div>

    <div style="text-align:center"><p>
        <?= Html::a('Добавить новое расписание', ['create'], ['style'=> 'background-color: #D972A1', 'class' => 'btn text-light']) ?>
    <a href="/menu/menu"><button type="button" style= "background-color: #E6738C" class="btn text-light">Меню для пользователей</button></a>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="ta">
    <table class="table table-bordered table-warning">
        <tread>
            <tr class="table-danger">
                <th scope="col">№</th>
                <th scope="col">День недели</th>
                <th scope="col">Завтрак</th>
                <th scope="col">Второй завтрак</th>
                <th scope="col">Обед</th>
                <th scope="col">Полдник</th>
                <th></th>
            </tr>
        </tread>
        <tbody>
            <?php
            $menus = Menu::find()->all();
           
            $content = '';
            $i=1;
            foreach ($menus as $menu){
                $menu=Menu::findOne($menu->id);
                $content .= "  <tr>
                <th scope='row'>{$i}</th>
                <td>{$menu->day}</td>
                <td>{$menu->breakfast}</td>
                <td>{$menu->second_br}</td>
                <td>{$menu->lunch}</td>
                <td>{$menu->dinner}</td>
                <td><a href='/menu/update?id={$menu->id}'><button class='btn btn-primary' >&#9998;</button></a>
                <a href='/menu/view?id={$menu->id}'><button class='btn btn-success'>&#128065;</button></a>
                
              </tr>";
                $i++;
            }
            echo $content;
            ?>
        </tbody>
    </table>
        </div></div>

</div>
