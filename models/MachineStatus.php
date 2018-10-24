<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MachineStatus".
 *
 * @property int $id
 * @property string $status
 *
 * @property Machines[] $machines
 */
class MachineStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MachineStatus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'required'],
            [['status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMachines()
    {
        return $this->hasMany(Machines::className(), ['statusid' => 'id']);
    }
}
