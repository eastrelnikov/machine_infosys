<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MachinesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Станки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="machines-index">

    <div align="center" class="well"><h1><?= Html::encode($this->title) ?></h1></div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="well">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'machinename',
            'description',
            [
                'attribute' => 'machinestypeid',
                'value' => 'machinestype.typename',
            ],
            [
                    'attribute' => 'statusid',
                'value' => 'status.status'
            ],
            [
                'attribute' => 'stateid',
                'value' => 'state.state'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
    <p>
        <?= Html::a('Добавить станок', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Просмотр доступных операций', ['/admin/machinesoper/index'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
