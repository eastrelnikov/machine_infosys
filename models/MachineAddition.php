<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 12.01.2018
 * Time: 18:14
 */

namespace app\models;


use yii\base\Model;

class MachineAddition extends Model
{
    public $machinesid;
    public $operationmas;

    public function rules()
    {
        return [
            [['machinesid', 'operationmas'], 'required'],
            [['machinesid'], 'integer'],
//            [['operationid'], 'exist', 'skipOnError' => true, 'targetClass' => Operations::className(), 'targetAttribute' => ['operationid' => 'id']],
            [['machinesid'], 'exist', 'skipOnError' => true, 'targetClass' => Machines::className(), 'targetAttribute' => ['machinesid' => 'id']],
        ];
    }

    public function addition()
    {
        foreach ($this->operationmas as $item)
        {
            $machine = new MachinesOperations();
            $machine->machinesid = $this->machinesid;
            $machine->operationid = $item;
            $machine->save();
        }
        return true;
    }

}