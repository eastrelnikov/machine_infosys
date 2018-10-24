<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Details".
 *
 * @property int $id
 * @property string $detailname
 *
 * @property DetailsInOrder[] $detailsInOrders
 */
class Details extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['detailname'], 'required'],
            [['detailname'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'detailname' => 'Detailname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailsInOrders()
    {
        return $this->hasMany(DetailsInOrder::className(), ['detailsid' => 'id']);
    }
}
