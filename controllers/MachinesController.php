<?php

namespace app\controllers;

use app\models\Machines;
use app\models\MachinesOperations;
use app\models\Operations;
use yii\web\controller;

class MachinesController extends Controller
{
    public function actionIndex()
    {
        $machmodel = Machines::find()->all();
        return $this->render('index',['machmodel' => $machmodel]);
    }
}
?>