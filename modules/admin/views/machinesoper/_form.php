<?php

use app\models\Machines;
use app\models\Operations;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MachinesOperations */
/* @var $model2 app\models\MachineAddition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="machines-operations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model2, 'machinesid')->dropDownList(ArrayHelper::map(Machines::find()->all(), 'id', 'machinename')) ->label("Станок");?>

    <div class="">
        <?= $form->field($model2, 'operationmas')->checkboxList(ArrayHelper::map(Operations::find()->all(), 'id', 'operationname'),[
            'item'=>function ($index, $label, $name, $checked, $value) {
                return '<div class="col-md-4">'.Html::checkbox($name,$checked,['label'=>$label,'value'=>$value]).'</div>';
            }
        ])->label('Операции'); ?>
    <br><br><br><br><br><br>
    <div align="center" class="form-group">
        <?= Html::submitButton('Далее', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
