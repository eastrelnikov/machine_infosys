<?php

use app\models\MachineAddition;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MachinesOperations */
/* @var $model2 app\models\MachineAddition */

$this->title = 'Добавление станка (операции)';
$this->params['breadcrumbs'][] = ['label' => 'Machines Operations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="machines-operations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model, 'model2' => $model2
    ]) ?>

</div>
