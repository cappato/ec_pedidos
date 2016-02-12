<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MemoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Memos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Memo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'numero',
            'titulo',
            'texto:ntext',
            'tags',
            // 'gerencia',
            // 'sector',
            // 'area',
            // 'manual',
            // 'fechacreacion',
            // 'fechamodificacion',
            // 'fechainicio',
            // 'fechafin',
            // 'creador',
            // 'vigente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
