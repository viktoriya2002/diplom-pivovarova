<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Child;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = $model->fio;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

<div style="text-align:center">
<div style="background-color: #FDF5FF; border:15px #5348b8bd ridge; maxlight:auto; padding: 5px 5px; margin:20px;">
    <h1>&#9884;Личный кабинет&#9884;</h1>
</div>
</div>
<hr style="text-align:center; maxlight:auto; background-color: #586FA6; border-top-width: 4px;"/>
<div style="text-align:center">
<h2>&#10086;<?= Html::encode($this->title) ?>&#10086;</h2>
<p></p>

    <p>
        <?= Html::a('Редактировать аккаунт', ['update', 'id' => $model->id], ['style'=> 'background-color: #6093DD', 'class' => 'btn text-light']) ?>
        <?= Html::a('Удалить аккаунт', ['delete', 'id' => $model->id], [
            'style'=> 'background-color: #D22D63',
            'class' => 'btn text-light',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить данный аккаунт?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
        </div>
        <div style="text-align:center"><?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'fio',
            'phone',
            'email:email',
            'adress',
            'place',
            'post',
        ],
    ]) ?></div>
<hr style="text-align:center; maxlight:auto; background-color: #586FA6; border-top-width: 4px;"/>
<div><p>
        <?= Html::a('Подать заявку', ['child/create'], ['style'=> 'background-color: #D972A1', 'class' => 'btn text-light']) ?>
    </p></div>
    <div class="ta">
<h1 style="text-align:center" class='text-dark'>Мои дети</h1>
    <table style="text-align:center" class="table table-bordered table-warning">
        <thead class="thead-light">
        <tr class="table-danger">
            <th scope="col">ФИО ребенка</th>
            <th scope="col">Дата рождения</th>
            <th scope="col">Пол</th>
            <th scope="col">Группа</th>
            <th scope="col">Адрес</th>
            <th scope="col">Доп. информация</th>
            <th scope="col">Статус</th>
            <th score="col">Изменение заявки</th>
        </tr>
        </thead>
        <tbody>
<?php
        $children = Child::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
        foreach ($children as $child){
            if($child->status=='В ожидании') {
                $content=Html::a('Удалить заявку', '/child/delete?id='.$child->id, [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Подтвердите удаление этого заказа?',
                        'method' => 'post',
                    ],
                ]) ;
            } else $content='';
            echo "    <tr>
      <td>{$child->fio}</td>
      <td>{$child->date_birth}</td>
      <td>{$child->gender}</td>
      <td>{$child->getGroup()->One()->name}</td>
      <td>{$child->adress}</td>
      <td>{$child->description}</td>
      <td>{$child->status}</td>
      <td>{$content}</td>
    </tr>";
        }
        ?>
 </tbody>
    </table>
    </div>
</div>
