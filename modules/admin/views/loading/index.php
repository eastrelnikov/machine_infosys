<?php

use app\models\Machines;
use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LoadingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Загрузка станков';
$this->params['breadcrumbs'][] = $this->title;
$gridColumns = [
    'id',
    'machineoperationid',
    'ordereddetailsid',
    'amount',
    'startdate',
    'enddate',

]
?>
<div class="loading-index">

    <div align="center" class="well"><h1><?= Html::encode($this->title) ?></h1></div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <div class="well"> <h4>Вывод в файл</h4>
    <?= ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns
    ]);?></div>
<div class="well">
    <?= \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
    ]); ?></div>
</div>
