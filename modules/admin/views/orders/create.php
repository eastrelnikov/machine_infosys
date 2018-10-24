<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = 'Добавление заказа';
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div align="center" class="well"><h1><?= Html::encode($this->title) ?></h1></div>
<div class="orders-create well">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
