<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мероприятия';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>

    <h1><?= Html::encode($this->title) ?></h1>

 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            // [
            //     'attribute'=> 'active',
            //     'content'=>function($data) {
            //         return $data->active ? '<i class="fas fa-check"></i>' : '<i class="fas fa-ban"></i>';
            //     }
            // ],
            'title',
            'Организаторы'
            
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'id' => $model->id]);
            //      }
            // ],
        ],
    ]); ?>


</div>
