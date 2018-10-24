<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DetailsInOrder */

$this->title = 'Добавление заказа (детали)';
$this->params['breadcrumbs'][] = ['label' => 'Детали в заказе', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div align="center" class="well"><h1><?= Html::encode($this->title) ?></h1></div>
<div class="details-in-order-create well">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
