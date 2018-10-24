<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Loading */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loading-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'machineoperationid')->textInput() ?>

    <?= $form->field($model, 'ordereddetailsid')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'startdate')->textInput() ?>

    <?= $form->field($model, 'enddate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
