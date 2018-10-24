<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\chartjs\ChartJs;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $machines[] \app\models\Machines */
/* @var $form yii\widgets\ActiveForm */
/* @var $months[] */
/* @var $dataset array */
/* @var $request array */

$this->registerJsFile('/web/js/jquery-2.1.1.min.js');
$this->registerJsFile('/web/js/chart1.js');
$this->title = 'Графики загруженности станков';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div align="center" class="well"><h1><?= Html::encode($this->title) ?></h1></div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group" style="margin-top: 25px">
            <div class="row">
                <div class="col-md-4" style="margin-top: 5px">
                    <label for="select-machine">Станок</label>
                </div>
                <div class="col-md-8">
                    <select class="form-control" name="machine" id="select-machine">
                        <?php foreach($machines as $machine): ?>
                            <option value="<?=$machine['id']?>" <? if($machine['id']==$request['machine']): ?> selected <?endif;?> ><?=$machine['machinename']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group" style="margin-top: 25px">
            <div class="row">
                <div class="col-md-4" style="margin-top: 5px">
                    <label for="select-type">Месяц</label>
                </div>
                <div class="col-md-8">
                    <select class="form-control" name="month" id="select-month">
                        <?php foreach($months as $key => $month): ?>
                            <option value="<?=$key?>" <? if($key==$request['type']): ?> selected <?endif;?> ><?=$month?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group" style="margin-top: 25px">
            <div class="row">
                <div class="col-md-3" style="margin-top: 5px">
                    <label for="select-year">Год</label>
                </div>
                <div class="col-md-6">
                    <?= \yii\widgets\MaskedInput::widget([
                        'name' => 'year',
                        'mask' => '9999',
                        'value' => !empty($request['year']) ? $request['year'] : ""
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group" style="margin-top: 25px">
            <?= Html::button('Построить', ['class' => 'btn btn-success', 'id' => 'build_chart']) ?>
        </div>
    </div>
</div>

<?= ChartJs::widget([
    'type' => 'bar',
    'options' => [
        'height' => 200,
        'width' => 400
    ],
    'data' => [
        'labels' => $labels,
        'datasets' => [
            $dataset
        ]
    ]
]);
?>