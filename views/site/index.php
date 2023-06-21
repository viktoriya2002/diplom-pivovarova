<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;


/** @var yii\web\View $this */

$this->title = 'Главная';
$new=\app\models\News::find()->orderBy(['time'=>SORT_DESC])->limit(5)->all();
$items=[];
?>

<div class="site-index">

<div style="text-align:center">
<div style="background-color: #FDF5FF; border:15px #5348b8bd ridge; maxlight:auto; padding: 5px 5px; margin:20px;">
    <h1>&#9885;Добро пожаловать!&#9885;</h1>
</div>
</div>
<hr style="text-align:center; maxlight:auto; background-color: #586FA6; border-top-width: 4px;"/>
<div style="text-align:justify">
<?php foreach ($new as $news){
    $items[]="<div style='min-height:470px; background-color: #AE699D' class='d-flex flex-column justify-content-center'> 
    <div style='background-color: #ECA4E3; border:8px #8744a8c9 ridge; maxlight:auto; padding: 5px 5px; margin:5px;'  >
    <h1 class='text-white text-center m-2'>{$news->name}</h1></div>
    <img class='m-auto' style='max-height: 250px;' src='{$news->photo}' alt='image' />
    <hr style='text-align:center; maxlight:auto; background-color: #586FA6; border-top-width: 4px;'/>
    <div class='text-white text-center m-2'>{$news->description}</div></div>";
}
echo yii\bootstrap5\Carousel::widget(['items'=>$items]);
?>
</div>
<br>
<div style="text-align:center"><p>
        <?= Html::a('Посмотреть все новости', ['news/news'], ['style'=> 'background-color: #D972A1', 'class' => 'btn text-light']) ?>
    </p>
</div>
