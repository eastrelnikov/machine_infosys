<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MachinesOperations */

$this->title = 'Update Machines Operations: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Machines Operations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="machines-operations-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
