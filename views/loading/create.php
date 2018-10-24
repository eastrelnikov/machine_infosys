<?php

use app\models\Details;
use app\models\Machines;
use app\models\Operations;
use app\models\Orders;
use app\models\Status;
use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\LoadingAddition */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Добавление загрузки станка';
$this->params['breadcrumbs'][] = ['label' => 'Загрузка', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div align="center" class="well"><h1><?= Html::encode($this->title) ?></h1></div>


<div class="orders-form well">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'machinesid')->dropDownList(ArrayHelper::map(Machines::find()->where(['statusid' => 1])->all(), 'id', 'machinename')) ->label("Станок");?>

    <?= $form->field($model, 'operationid')->dropDownList(ArrayHelper::map(Operations::find()->all(), 'id', 'operationname')) ->label("Операция");?>

    <?= $form->field($model, 'ordersid')->dropDownList(ArrayHelper::map(Orders::find()->all(), 'id', 'ordername')) ->label("Заказ");?>

    <?= $form->field($model, 'detailsid')->dropDownList(ArrayHelper::map(Details::find()->all(), 'id', 'detailname')) ->label("Деталь");?>

    <?= $form->field($model, 'amount')->textInput()->label('Количество') ?>

    <?= $form->field($model, 'startdate')->widget(DateTimePicker::className(),[
        'name' => 'dp_1',
        'type' => DateTimePicker::TYPE_INPUT,
        'options' => ['placeholder' => 'Ввод даты/времени...'],
        'convertFormat' => true,
        'value'=> date("d.m.Y h:i",(integer) $model->startdate),
        'pluginOptions' => [
            'format' => 'yyyy-MM-dd HH:mm:ss',
            'autoclose'=>true,
            'weekStart'=>1, //неделя начинается с понедельника
            'startDate' => '01.05.2015 00:00', //самая ранняя возможная дата
            'todayBtn'=>true, //снизу кнопка "сегодня"
        ]
    ])->label('Время начала'); ?>


    <div align="center" class="form-group">
        <?= Html::submitButton('Далее', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
