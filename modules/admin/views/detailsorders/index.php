<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetailsInOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="details-in-order-index">

    <div align="center" class="well"> <h1><?= Html::encode($this->title) ?></h1></div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="well">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            [
                'attribute' => 'ordersid',
                'value' => 'orders.ordername',
            ],
            [
                'attribute' => 'detailsid',
                'value' => 'details.detailname',
            ],
            'amount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

    <p>
        <?= Html::a('Добавить детали в заказ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
