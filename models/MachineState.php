<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MachineState".
 *
 * @property int $id
 * @property string $state
 *
 * @property Machines[] $machines
 */
class MachineState extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MachineState';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state'], 'required'],
            [['state'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'state' => 'State',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMachines()
    {
        return $this->hasMany(Machines::className(), ['stateid' => 'id']);
    }
}
