<?php

namespace app\models;

use DateInterval;
use Faker\Provider\DateTime;
use Yii;
use app\models\Loading;
use yii\base\Model;

class LoadingAddition extends Model
{
    public $machinesid;
    public $operationid;
    public $ordersid;
    public $detailsid;
    public $amount;
    public $startdate;
    public $userid;

    public function rules()
    {
        return [
          [['machinesid','operationid','ordersid','detailsid','amount','startdate'],'required'],
        ];
    }

    public function add()
    {
        $loading = new Loading();
        $loading->machineoperationid = MachinesOperations::findOne(['machinesid' => $this->machinesid, 'operationid' => $this->operationid])->id;
        $loading->ordereddetailsid = DetailsInOrder::findOne(['ordersid' => $this->ordersid, 'detailsid' => $this->detailsid])->id;
        $loading->amount = $this->amount;
        $loading->startdate = $this->startdate;
        $minutes_to_add = Operations::findOne($this->operationid)->duration;

        $new_day_plus1 = new \DateTime($this->startdate);
        $new_day_plus1->add(new DateInterval('PT' . $minutes_to_add . 'M'));

        $loading->enddate = $new_day_plus1->format('Y-m-d H:i:s');
        $loading->userid =  Yii::$app->user->id;
        $loading->save();
        return true;
    }
}