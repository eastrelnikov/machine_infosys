<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Machines".
 *
 * @property int $id
 * @property string $machinename
 * @property string $description
 * @property int $machinestypeid
 * @property int $statusid
 * @property int $stateid
 *
 * @property MachinesType $machinestype
 * @property MachineStatus $status
 * @property MachineState $state
 * @property MachinesOperations[] $machinesOperations
 */
class Machines extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Machines';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['machinename', 'description', 'machinestypeid', 'statusid', 'stateid'], 'required'],
            [['machinestypeid', 'statusid', 'stateid'], 'integer'],
            [['machinename'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 1000],
            [['machinestypeid'], 'exist', 'skipOnError' => true, 'targetClass' => MachinesType::className(), 'targetAttribute' => ['machinestypeid' => 'id']],
            [['statusid'], 'exist', 'skipOnError' => true, 'targetClass' => MachineStatus::className(), 'targetAttribute' => ['statusid' => 'id']],
            [['stateid'], 'exist', 'skipOnError' => true, 'targetClass' => MachineState::className(), 'targetAttribute' => ['stateid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Инв.номер',
            'machinename' => 'Название',
            'description' => 'Описание',
            'machinestypeid' => 'Тип',
            'statusid' => 'Статус',
            'stateid' => 'Состояние',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMachinestype()
    {
        return $this->hasOne(MachinesType::className(), ['id' => 'machinestypeid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(MachineStatus::className(), ['id' => 'statusid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(MachineState::className(), ['id' => 'stateid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMachinesOperations()
    {
        return $this->hasMany(MachinesOperations::className(), ['machinesid' => 'id']);
    }
}
