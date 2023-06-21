<?php

use app\models\News;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\NewsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

<div style="text-align:center">
<div style="background-color: #FDF5FF; border:15px #5348b8bd ridge; maxlight:auto; padding: 5px 5px; margin:20px;">    
<h1>&#9731;<?= Html::encode($this->title) ?>&#9731;</h1>
</div></div>
<hr style="text-align:center; maxlight:auto; background-color: #586FA6; border-top-width: 4px;"/>
<div>
<?php $news=$dataProvider->getModels();
echo "<div class='d-flex flex-row flex-wrap justify-content-start align-items-end'>";
    foreach ($news as $news){
   
    echo "<div class='d-flex flex-column flex-wrap center-content-start border border-2 border-dark align-items-end card m-3' style='width: 30%; min-width: 250px; background-color: #AE699D;'>
        <a class='img-center' href='/news/view?id={$news->id}'><img src='{$news->photo}' class='card-img' style='height: 200px; ' alt='image'></a>
        <div style='min-height: 260px; ' class='card-body w-100'>
            <div style='text-align:center; background-color: #ECA4E3; color: #FFF' class='d-flex flex-row flex-wrap align-items-end'><h5 class='card-title'>&nbsp;{$news->name}</h5></div>
            <div class='w-100' style='text-align:justify; color: #FFF'><b>Группа: </b>«{$news->getGroup()->One()->name}»</div>
            <div class='' style='text-align:justify; color: #FFF'>{$news->description}</div>";
            echo "</div></div>";
    }
    echo "</div>";
    
?>

</div>