<?php

use app\models\MachineState;
use app\models\MachineStatus;
use app\models\MachinesType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Machines */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="machines-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'machinename')->textInput(['maxlength' => true])->label('Название') ?>

    <?= $form->field($model, 'description')->textArea(['maxlength' => true])->label('Описание') ?>

    <?= $form->field($model, 'machinestypeid')->dropDownList(ArrayHelper::map(MachinesType::find()->all(), 'id', 'typename')) ->label("Тип станка");?>

    <?= $form->field($model, 'statusid')->dropDownList(ArrayHelper::map(MachineStatus::find()->all(), 'id', 'status')) ->label("Статус");?>

    <?= $form->field($model, 'stateid')->dropDownList(ArrayHelper::map(MachineState::find()->all(), 'id', 'state')) ->label("Состояние");?>

    <div align="center" class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
