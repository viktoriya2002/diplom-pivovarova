<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['../admin/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

<div style="text-align:center">
<div style="background-color: #FDF5FF; border:15px #5348b8bd ridge; maxlight:auto; padding: 5px 5px; margin:20px;">
<h1>&#9884;Все пользователи&#9884;</h1>
</div></div>

    <div style="text-align:center">      

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="ta">
    <table class="table table-bordered table-warning">
        <tread>
            <tr class="table-danger">
                <th scope="col">№</th>
                <th scope="col">ФИО родителя</th>
                <th scope="col">Телефон</th>
                <th scope="col">Почта</th>
                <th scope="col">Адрес проживания</th>
                <th scope="col">Место работы</th>
                <th scope="col">Должность</th>
                <th scope="col">Логин</th>
                <th></th>
            </tr>
        </tread>
        <tbody>
            <?php
            $users = User::find()->all();
           
            $content = '';
            $i=1;
            foreach ($users as $user){
                $user=User::findOne($user->id);
                $content .= "  <tr>
                <th scope='row'>{$i}</th>
                <td>{$user->fio}</td>
                <td>{$user->phone}</td>
                <td>{$user->email}</td>
                <td>{$user->adress}</td>
                <td>{$user->place}</td>
                <td>{$user->post}</td>
                <td>{$user->login}</td>
                <td><a href='/user/update?id={$user->id}'><button class='btn btn-primary' >&#9998;</button></a>
                <a href='/user/view?id={$user->id}'><button class='btn btn-success'>&#128065;</button></a>
                
              </tr>";
                $i++;
            }
            echo $content;
            ?>
        </tbody>
    </table>
        </div></div> 


</div>
