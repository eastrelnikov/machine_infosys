<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Loading".
 *
 * @property int $id
 * @property int $machineoperationid
 * @property int $ordereddetailsid
 * @property double $amount
 * @property string $startdate
 * @property string $enddate
 * @property int $userid
 *
 * @property MachinesOperations $machineoperation
 * @property DetailsInOrder $ordereddetails
 * @property User $user
 */
class Loading extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Loading';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['machineoperationid', 'ordereddetailsid', 'amount', 'userid'], 'required'],
            [['machineoperationid', 'ordereddetailsid', 'userid'], 'integer'],
            [['amount'], 'number'],
            [['startdate', 'enddate'], 'safe'],
            [['machineoperationid'], 'exist', 'skipOnError' => true, 'targetClass' => MachinesOperations::className(), 'targetAttribute' => ['machineoperationid' => 'id']],
            [['ordereddetailsid'], 'exist', 'skipOnError' => true, 'targetClass' => DetailsInOrder::className(), 'targetAttribute' => ['ordereddetailsid' => 'id']],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'machineoperationid' => 'Machineoperationid',
            'ordereddetailsid' => 'Ordereddetailsid',
            'amount' => 'Amount',
            'startdate' => 'Startdate',
            'enddate' => 'Enddate',
            'userid' => 'Userid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMachineoperation()
    {
        return $this->hasOne(MachinesOperations::className(), ['id' => 'machineoperationid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdereddetails()
    {
        return $this->hasOne(DetailsInOrder::className(), ['id' => 'ordereddetailsid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userid']);
    }
}
