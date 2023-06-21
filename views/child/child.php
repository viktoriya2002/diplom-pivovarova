<?php

use app\models\Child;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ChildSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="child-index">

<div style="text-align:center">
<div style="background-color: #FDF5FF; border:15px #5348b8bd ridge; maxlight:auto; padding: 5px 5px; margin:20px;"> 
    <h1>&#10000;Список заявок&#10000;</h1>
</div></div>
<hr style="text-align:center; maxlight:auto; background-color: #586FA6; border-top-width: 4px;"/>
<div style="text-align:center"><?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="ta">
<table class="table table-bordered table-warning">
        <tread>
            <tr class="table-danger">
                <th scope="col">№</th>
                <th scope="col">ФИО ребенка</th>
                <th scope="col">Дата рождения</th>
                <th scope="col">Группа</th>
                <th scope="col">Статус</th>
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
                <td>{$child->getGroup()->One()->name}</td>
                <td>{$child->status}</td>
                </td>
              </tr>";
                $i++;
            }
            echo $content;
            ?>
        </tbody>
    </table>
        
        </div>&nbsp;</div>
        <div>
        <button type="button" onclick="window.history.back(-1)" style= "background-color: #d972a1" class="btn text-light">Назад</button>
        </div>
</div>
