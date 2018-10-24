<?php

use app\models\Details;
use app\models\Orders;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetailsInOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="details-in-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ordersid')->dropDownList(ArrayHelper::map(Orders::find()->all(), 'id', 'ordername')) ->label("Заказ");?>

    <?= $form->field($model, 'detailsid')->dropDownList(ArrayHelper::map(Details::find()->all(), 'id', 'detailname')) ->label("Деталь");?>

    <?= $form->field($model, 'amount')->textInput()->label('Количество') ?>

    <div align="center" class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
