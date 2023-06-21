<?php

use app\models\AgeGroup;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;


$this->title = 'Панель администратора';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="text-align:center">
<div style="background-color: #FDF5FF; border:15px #5348b8bd ridge; maxlight:auto; padding: 5px 5px; margin:20px;">
<h1>&#8258;<?= Html::encode($this->title) ?>&#8258;</h1>
</div>
</div>
<hr style="text-align:center; maxlight:auto; background-color: #586FA6; border-top-width: 4px;"/>
<form class="row g-auto">
    
<br>
<div >
    <div style="text-align:center">

    <div><a href="/news"><button type="button" style= "background-color: #8A46D9" class="btn text-light">Панель настроек новостей</button></a></div>
    <p></p>
    <div><a href="/user"><button type="button" class="btn btn-primary">Список родителей</button></a></div>
    <p></p>
    <div><a href="/child"><button type="button" class="btn btn-info text-light">Список детей</button></a></div>
    <p></p>
    <div><a href="/group"><button type="button" class="btn btn-success">Список групп</button></a></div>
    <p></p>
    <div><a href="/age-group"><button type="button" class="btn btn-warning text-light">Список категорий</button></a></div>
    <p></p>
    <div><a href="/menu"><button type="button" class="btn btn-danger text-light">Панель редактирования меню</button></a></div>

</div>
</div>
<br>
    
</form>

