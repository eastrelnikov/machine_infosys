<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MachinesType".
 *
 * @property int $id
 * @property string $typename
 */
class MachinesType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MachinesType';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['typename'], 'required'],
            [['typename'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'typename' => 'Typename',
        ];
    }
}
