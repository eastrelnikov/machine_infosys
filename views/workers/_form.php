<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Workers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tabnom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
