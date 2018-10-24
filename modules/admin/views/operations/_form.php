<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Operations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'operationname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duration')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Далее', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
