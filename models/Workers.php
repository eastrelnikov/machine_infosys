<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Workers".
 *
 * @property int $id
 * @property string $tabnom
 * @property string $fullname
 * @property string $position
 */
class Workers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Workers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tabnom', 'fullname', 'position'], 'required'],
            [['tabnom'], 'string', 'max' => 6],
            [['fullname', 'position'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tabnom' => 'Tabnom',
            'fullname' => 'Fullname',
            'position' => 'Position',
        ];
    }
}
