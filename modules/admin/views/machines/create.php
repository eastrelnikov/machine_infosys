<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Machines */

$this->title = 'Добавление станка';
$this->params['breadcrumbs'][] = ['label' => 'Станки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div align="center" class="well"><h1><?= Html::encode($this->title) ?></h1></div>
<div class="machines-create well">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
