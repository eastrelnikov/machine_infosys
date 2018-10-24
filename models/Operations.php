<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Operations".
 *
 * @property int $id
 * @property string $operationname
 * @property double $duration
 *
 * @property MachinesOperations[] $machinesOperations
 */
class Operations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Operations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['operationname', 'duration'], 'required'],
            [['duration'], 'number'],
            [['operationname'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'operationname' => 'Operationname',
            'duration' => 'Duration',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMachinesOperations()
    {
        return $this->hasMany(MachinesOperations::className(), ['operationid' => 'id']);
    }
}
