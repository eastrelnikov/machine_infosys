<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MachinesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="machines-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'machinename') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'machinestypeid') ?>

    <?= $form->field($model, 'statusid') ?>

    <?php // echo $form->field($model, 'stateid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
