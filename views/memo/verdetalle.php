<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Memo */

//$geren = 'gerencia0.nombre';
$sect = 'sector0.nombre';
            [
            'label'=>'Gerencia',            
            'attribute'=>'gerencia0.nombre',
            ],

print_r($sector);exit;
$this->title = $model->titulo;
//$this->params['breadcrumbs'][] = ['label' => 'Memos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memo-view">
    <h1><?= Html::encode($geren) ?></h1>
    <h1><?= Html::encode($sect) ?></h1>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'numero',
            [
                'label'=>'Detalle',
                'value'=>utf8_encode($model->texto),
            ]
        ],
    ]) ?>

</div>
