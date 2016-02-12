<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Novedades';
?>
<div class="memo-index">

 
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //= Html::a('Volver', ['index'], ['class' => 'btn btn-success']) ?>
        <?php // = Html::a('Imprimir', ['importarusu'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
[
            'label'=>'Codigo',
            'attribute'=>'id',
            //'style'=>['width:30px'],
//            'contentOptions' => ['style'=>'width:80px'],
            ],
            [
            'label'=>'Fecha',
            'attribute'=>'fechainicio',
            //'style'=>['width:30px'],
//            'contentOptions' => ['style'=>'width:80px'],
            'format' => ['date', 'php:d-m-Y']
            ],

            [
            'label'=>'Gerencia',
            'attribute'=>'gerencia',
            //'style'=>['width:30px'],
            //'contentOptions' => ['style'=>'width:80px'],
            ],

            [
            'label'=>'Sector',
            'attribute'=>'sector',
            //'style'=>['width:30px'],
            //'contentOptions' => ['style'=>'width:80px'],
            ],

            [
            'label'=>'Título',
            'attribute'=>'titulo',
            //'style'=>['width:30px'],
           // 'contentOptions' => ['style'=>'width:300px'],
            ],

            ['class' => 'yii\grid\ActionColumn',
            'header'=>'Consulta',
            'template' =>'{view}',
            'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('view', ['verdetalle', 'id'=> $model['id']]);
                    },
                ]
            ],


           /*
            [
            'label'=>'Detalle',
            'attribute'=>'texto',
            'contentOptions' => ['style'=>'width:150px'],
            ], 
            */
        ],
    ]); ?>

</div>
