<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MachinesOperations".
 *
 * @property int $id
 * @property int $machinesid
 * @property int $operationid
 */
class MachinesOperations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MachinesOperations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['machinesid', 'operationid'], 'required'],
            [['machinesid', 'operationid'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'machinesid' => 'Machinesid',
            'operationid' => 'Operationid',
        ];
    }
}
