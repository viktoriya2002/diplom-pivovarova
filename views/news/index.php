<?php

use app\models\News;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\NewsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Все новости';
$this->params['breadcrumbs'][] = ['label' => 'Панель администратора', 'url' => ['../admin/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

<div style="text-align:center">
<div style="background-color: #FDF5FF; border:15px #5348b8bd ridge; maxlight:auto; padding: 5px 5px; margin:20px;">    
<h1>&#9731;<?= Html::encode($this->title) ?>&#9731;</h1>
</div></div>

    <div style="text-align:center"><p>
        <?= Html::a('Добавить новую запись', ['create'], ['style'=> 'background-color: #D972A1', 'class' => 'btn text-light']) ?>
        <a href="/news/news"><button type="button" style= "background-color: #E6738C" class="btn text-light">Новости для пользователей</button></a>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    //?>

        <div class="ta">
    <table class="table table-bordered table-warning">
        <tread>
            <tr class="table-danger">
                <th scope="col">№</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Группа</th>
                <th scope="col">Описание записи</th>
                <th scope="col">Время создания</th>
                <th scope="col">Изображение</th>
                <th></th>
            </tr>
        </tread>
        <tbody>
            <?php
            $new = News::find()->all();
           
            $content = '';
            $i=1;
            foreach ($new as $news){
                $news=News::findOne($news->id);
                $content .= "  <tr>
                <th scope='row'>{$i}</th>
                <td>{$news->name}</td>
                <td>{$news->getGroup()->One()->name}</td>
                <td>{$news->description}</td>
                <td>{$news->time}</td>
                <td><img src='{$news->photo}' alt='photo' style='width: 100px;'></td>
                <td><a href='/news/update?id={$news->id}'><button class='btn btn-primary' >&#9998;</button></a>
                <a href='/news/view?id={$news->id}'><button class='btn btn-success'>&#128065;</button></a>
              </tr>";
                $i++;
            }
            echo $content;
            ?>
        </tbody>
    </table>
        </div></div>

</div>
