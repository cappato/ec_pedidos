<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Empresas;
use app\models\Gerencias;
use app\models\Sectores;
use app\models\Imageupload;
use app\models\Areas;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\file\FileInput;

use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $model->isNewRecord ? $form->field($model, 'empresa')->dropDownList(ArrayHelper::map(Empresas::find()->all(), 'codigo', 'nombre'), 
            [           
                'onchange'=>'if ($(this).val()!= "")
                {
                $.get( "'.Url::toRoute('usuario/gerencias').'", { id: $(this).val() } )
                                .done(function( data ) {
                                    var myArray=JSON.parse(data);
                                    $( "#usuario-gerencia" ).html("");
                                    $.each( myArray, function( i, l ){
                                        $( "#usuario-gerencia" ).append($("<option>", {
                                            value: i,
                                            text: l
                                        }));
                                    });
                                $("#usuario-legajo").prop("readonly", false);
                                $("#usuario-gerencia").prop("disabled", false); 
                                 $("#usuario-sector").prop("disabled", false); 
                                 $("#usuario-area").prop("disabled", false);    
                            });
                 }else{
                     $("#usuario-legajo").prop("readonly", true);
                     $("#usuario-gerencia").prop("disabled", true); 
                     $("#usuario-gerencia").val("");
                     $("#usuario-sector").prop("disabled", true); 
                     $("#usuario-sector").val("");
                     $("#usuario-area").prop("disabled", true);
                     $("#usuario-area").val("");
                 } '
                , 'prompt'=>'Seleccione una empresa'
            ]):'';
    ?>

    <?= $model->isNewRecord ?$form->field($model, 'legajo')->textInput(['readonly' =>true]):'';?>

    <?php //=  $model->isNewRecord ?$form->field($model, 'gerencia')->dropDownList(array(),?>
    <?= $form->field($model, 'gerencia')->dropDownList(ArrayHelper::map(Gerencias::find()->all(), 'id', 'nombre'),
    [
        'onchange'=>'
                        $.get( "'.Url::toRoute('usuario/sectores').'", { id: $(this).val() } )
                            .done(function( data ) {
                                var myArray=JSON.parse(data);
                                    $( "#usuario-sector" ).html("");
                                    $.each( myArray, function( i, l ){
                                        $( "#usuario-sector" ).append($("<option>", {
                                            value: i,
                                            text: l
                                        }));
                                    });
                            }
                        );
                    ',
        'prompt'=>'Seleccione una gerencia'
    ]
    ); 
    ?>
         
    <?= $form->field($model, 'sector')->dropDownList(array(),
        [  
           'onchange'=>'
                            $.get( "'.Url::toRoute('usuario/areas').'", { id: $(this).val() } )
                                .done(function( data ) {
                                    var myArray=JSON.parse(data);
                                        $( "#usuario-area" ).html("");
                                        $.each( myArray, function( i, l ){
                                            $( "#usuario-area" ).append($("<option>", {
                                                value: i,
                                                text: l
                                            }));
                                        });
                                }
                            );
                        ',
            'prompt'=>'Elija un Sector'

        ]
        ); 
    ?>

    <?= $form->field($model, 'area')->dropDownList(array(), 
            [
                'prompt'=>'Elija un Area'
            ]) 
    ?>

    <?= $form->field($model, 'categoria')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput() ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'ultimoacceso')->textInput() ?>

    <?= $form->field($model, 'fechamodificacion')->textInput() ?>

    <?= $form->field($model, 'admin')->checkbox()?>

    <?= $form->field($model, 'cambiapass')->checkbox()?>

    <?= $form->field($model, 'documento')->textInput() ?>


     <?= $form->field($model, 'fechanacimiento')->widget(DateControl::classname(), [

        'type'=>DateControl::FORMAT_DATE,
    'displayFormat' => 'php:D, d-M-Y',
    'language'=>'es',
    'options' => [
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]
]);
    
/*
echo $form->field($model, 'fechanacimiento')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Ingrese fecha de Nacimiento...'],
    'language' => 'es',
    'pluginOptions' => [
        'autoclose'=>true,
    ]

    ]);
    */
    ?>

    <?= $form->field($model, 'activo')->checkbox()?>

    <?php /* = $form->field($imageModel, 'image')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
         'pluginOptions'=>[
                'class'=> 'file-preview-image',
                'showCaption' => false,
                'showRemove' => false,
                'showUpload' => true,
                'browseClass' => 'btn btn-primary btn-block',
                'browseIcon' => '<i class="glyphicon glyphicon-folder-open"></i> ',
                'browseLabel' =>  'Elegir imagenes',
                'initialPreview'=>[Html::img('uploads/'.$model->legajo.'_'.$model->empresa.'.jpg',  ['class'=>'file-preview-image',])],
                'overwriteInitial'=>true,
                'uploadUrl' => Url::to(['/usuario/uploads/', 'image' => $imageModel->image]),
                'allowedFileExtensions'=>['jpg'],
                ],

    ]); */ ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Grabar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$onClickArt=$this->registerJs(" 

$(document).ready(function() {
    if (!($model->isNewRecord)){
    $.get( '".Url::toRoute('usuario/gerencias')."', { id: '".(isset($model->empresa))? $model->empresa:"0"."'})
    .done(function( data ) {
        var myArray=JSON.parse(data);
        
        $.each( myArray, function( i, l ){
            $( '#usuario-gerencia' ).append($('<option>', {
                value: i,
                text: l
            }));
        });
        
    });
    $.get( '".Url::toRoute('usuario/sectores')."', { id: $model->gerencia } )
    .done(function( data ) {
        var myArray=JSON.parse(data);
        $.each( myArray, function( i, l ){
            $( '#usuario-sector' ).append($('<option>', {
                value: i,
                text: l
            }));
        }); 
         
        $( '#usuario-sector' ).val($model->sector);
    });   
    $.get( '".Url::toRoute('usuario/areas')."', { id: $model->sector } )
    .done(function( data ) {
        var myArray=JSON.parse(data);
            $.each( myArray, function( i, l ){
                $( '#usuario-area' ).append($('<option>', {
                    value: i,
                    text: l
                }));
        });
        $( '#usuario-area' ).val($model->area);
    });

    }         
}); 
   

");
?>
