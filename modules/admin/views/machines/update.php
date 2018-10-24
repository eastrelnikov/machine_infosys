<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Machines */

$this->title = 'Update Machines: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Machines', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="machines-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
