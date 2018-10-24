<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetailsInOrder */

$this->title = 'Update Details In Order: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Details In Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="details-in-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
