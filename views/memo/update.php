<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Memo */

$this->title = 'Update Memo: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Memos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="memo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
