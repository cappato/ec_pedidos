<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = '(' . $model->legajo . ') ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php /* = Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Confirma eliminar?',
                'method' => 'post',
            ],
        ]) */?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
            'label'=>'Legajo',
            'attribute'=>'legajo',
            ],
            [
            'label'=>'Empresa',
            'attribute'=>'empresa0.nombre',
            ],
            [
            'label'=>'Gerencia',            
            'attribute'=>'gerencia0.nombre',
            ],
            [
            'label'=>'Sector',            
            'attribute'=>'sector0.nombre',
            ],
            [
            'label'=>'Area',            
            'attribute'=>'area0.nombre',
            ],
            'categoria',
            'nombre',
            [
            'label'=>'Password',
            'format'=>'HTML',
            'value'=>'********',
//            'password',
            ],
            [
            'label'=>'Administrador',
            'format'=>'HTML',
            'value'=>($model->admin==1)?'<span class="glyphicon glyphicon-ok  text-success"></span>':'<span class=" text-danger glyphicon glyphicon-remove"></span>',
            ],
            //'cambiapass',
            
            [
            'label'=>'Nuevo Pasword',
            'format'=>'HTML',
            'value'=>($model->cambiapass==1)?'<span class="glyphicon glyphicon-ok  text-success"></span>':'<span class=" text-danger glyphicon glyphicon-remove"></span>',
            ],
            [
            'label'=>'Ultimo acceso',
            'attribute'=>'ultimoacceso',
            ],
            [
            'label'=>'Nro de documento',
            'attribute'=>'documento',
            ],
            [
            'label'=>'Fecha de nacimiento',
            'attribute'=>'fechanacimiento',
            ],
            [
            'label'=>'Activo',
            'format'=>'HTML',
            'value'=>($model->activo==1)?'<span class="glyphicon glyphicon-ok  text-success"></span>':'<span class=" text-danger glyphicon glyphicon-remove"></span>',
            ],
            [
            'label'=>'Fecha de modificación',
            'attribute'=>'fechamodificacion',
            ],
            [
            'label'=>'Fecha de alta',
            'attribute'=>'fechaalta',
            ],   
            /*
            [
            'attribute'=>'Foto',
            'value'=>'uploads/' . $model->legajo . '_' . $model->empresa . '.jpg',
            'format' => ['image',['width'=>'100','height'=>'100']],                
            ],*/
        ],
    ]) ?>

</div>
