<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Memo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="memo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'numero')->textInput() ?>

    <?= $form->field($model, 'titulo')->textInput() ?>

    <?= $form->field($model, 'texto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->textInput() ?>

    <?= $form->field($model, 'gerencia')->textInput() ?>

    <?= $form->field($model, 'sector')->textInput() ?>

    <?= $form->field($model, 'area')->textInput() ?>

    <?= $form->field($model, 'manual')->textInput() ?>

    <?= $form->field($model, 'fechacreacion')->textInput() ?>

    <?= $form->field($model, 'fechamodificacion')->textInput() ?>

    <?= $form->field($model, 'fechainicio')->textInput() ?>

    <?= $form->field($model, 'fechafin')->textInput() ?>

    <?= $form->field($model, 'creador')->textInput() ?>

    <?= $form->field($model, 'vigente')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
