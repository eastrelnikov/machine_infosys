<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Orders".
 *
 * @property int $id
 * @property string $ordername
 * @property int $customerid
 * @property string $enddate
 * @property int $status
 *
 * @property DetailsInOrder[] $detailsInOrders
 * @property Status $status0
 * @property Customers $customer
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ordername', 'customerid', 'enddate', 'status'], 'required'],
            [['customerid', 'status'], 'integer'],
            [['enddate'], 'safe'],
            [['ordername'], 'string', 'max' => 100],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status' => 'id']],
            [['customerid'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['customerid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ordername' => 'Ordername',
            'customerid' => 'Customerid',
            'enddate' => 'Enddate',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailsInOrders()
    {
        return $this->hasMany(DetailsInOrder::className(), ['ordersid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Status::className(), ['id' => 'status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customers::className(), ['id' => 'customerid']);
    }
}
