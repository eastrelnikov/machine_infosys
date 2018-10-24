<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoadingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loading-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'machineoperationid') ?>

    <?= $form->field($model, 'ordereddetailsid') ?>

    <?= $form->field($model, 'amount') ?>

    <?= $form->field($model, 'startdate') ?>

    <?php // echo $form->field($model, 'enddate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
