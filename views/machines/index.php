<?php use app\models\MachinesOperations;
use app\models\Operations;
$this->title = "Станки";
$this->params['breadcrumbs'][] = $this->title;
if(count($machmodel)): ?>
    <h1>Просмотр станков</h1><br><br>
    <?php foreach($machmodel as $item): ?>
        <div class="container well">
            <div class="row">
                <div class="col-md-8 well"><h2 class="well"><?= $item->machinename?></h2>
                    <h5>► Инвентарный номер: <?= $item->id?></h5>
                    <h5>► Описание: <?= $item->description?></h5></div>
                <?php $oper = MachinesOperations::find()
                    ->where(['machinesid' => $item->id])->all()?>
                <?php if(count($oper)): ?>
                <div class="col-md-4 well">
                    <h2>Доступные операции:</h2>
                    <?php foreach ($oper as $item1):?>
                        <br>
                    ► <?= Operations::findOne($item1->operationid)->operationname ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif ?>
