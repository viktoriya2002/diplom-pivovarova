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
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

<div style="text-align:center">
<div style="background-color: #FDF5FF; border:15px #5348b8bd ridge; maxlight:auto; padding: 5px 5px; margin:20px;">    
<h1>&#9749;<?= Html::encode($this->title) ?>&#9749;</h1>
</div></div>
<hr style="text-align:center; maxlight:auto; background-color: #586FA6; border-top-width: 4px;"/>
<div style="text-align:center"><?php //echo $this->render('_search', ['model' => $searchModel]); ?>
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
