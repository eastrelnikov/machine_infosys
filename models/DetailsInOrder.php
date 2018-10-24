<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "DetailsInOrder".
 *
 * @property int $id
 * @property int $ordersid
 * @property int $detailsid
 * @property double $amount
 *
 * @property Details $details
 * @property Orders $orders
 */
class DetailsInOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'DetailsInOrder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ordersid', 'detailsid', 'amount'], 'required'],
            [['ordersid', 'detailsid'], 'integer'],
            [['amount'], 'number'],
            [['detailsid'], 'exist', 'skipOnError' => true, 'targetClass' => Details::className(), 'targetAttribute' => ['detailsid' => 'id']],
            [['ordersid'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['ordersid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ordersid' => 'Заказ',
            'detailsid' => 'Детали',
            'amount' => 'Количество',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetails()
    {
        return $this->hasOne(Details::className(), ['id' => 'detailsid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasOne(Orders::className(), ['id' => 'ordersid']);
    }
}
