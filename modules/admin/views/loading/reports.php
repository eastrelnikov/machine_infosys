<?php

use app\models\Machines;
use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LoadingSearch */
/* @var $machines[] \app\models\Machines */
/* @var $months[] */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $request array */

$this->registerJsFile('/web/js/jquery-2.1.1.min.js');
$this->registerJsFile('/web/js/report.js');
$this->title = 'Загруженность станков';
$this->params['breadcrumbs'][] = $this->title;
$gridColumns = [
    'Machine',
    'Operation',
    'Orders',
    'Detail',
    'count',
    'Loaddate',

]
?>
<div class="loading-index">

    <div align="center" class="well"><h1><?= Html::encode($this->title) ?></h1></div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
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

        <div class="col-md-offset-1">
            <div class="form-group" style="margin-top: 25px">
                <?= Html::button('Отчёт', ['class' => 'btn btn-success', 'id' => 'build_report']) ?>
            </div>
        </div>
    </div>
    <div class="well"> <h4>Вывод в файл</h4>
        <?= ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns
        ]);?></div>
    <div class="well">
        <?= \kartik\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
        ]); ?></div>
</div>
