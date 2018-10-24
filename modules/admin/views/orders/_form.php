<?php

use app\models\Customers;
use app\models\Status;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form well">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ordername')->textInput(['maxlength' => true])->label('Название') ?>

    <?= $form->field($model, 'customerid')->dropDownList(ArrayHelper::map(Customers::find()->all(), 'id', 'name')) ->label("Заказчик");?>

    <?= $form->field($model, 'enddate')->textInput()->label('Директивный срок')->widget(MaskedInput::className(), [
        'mask' => '9999-99-99',
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList(ArrayHelper::map(Status::find()->all(), 'id', 'status')) ->label("Статус");?>

    <div align="center" class="form-group">
        <?= Html::submitButton('Далее', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
