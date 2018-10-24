<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.01.2018
 * Time: 16:48
 */

namespace app\modules\admin\controllers;

use app\models\Loading;
use app\models\LoadingSearch;
use app\models\Machines;
use app\models\MachinesOperations;
use Yii;
use app\models\LoadingAddition;
use yii\data\SqlDataProvider;
use yii\web\Controller;

class LoadingController extends Controller
{
    public function actionIndex()
    {

        $searchModel = new LoadingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new LoadingAddition();
        if($model->load(Yii::$app->request->post()) && $model->add())
        {
            $this->redirect('/admin/loading');
        }
        return $this->render('create',['model' => $model]);
    }

    public function actionCharts()
    {
        $request = Yii::$app->request->queryParams;

        $labels = [];
        $dataset = [
            'label' => "Количество деталей",
            'backgroundColor' => "rgba(139, 110, 224, 1)",
            'borderColor' => "rgba(179,181,198,1)",
            'pointBackgroundColor' => "rgba(179,181,198,1)",
            'pointBorderColor' => "#fff",
            'pointHoverBackgroundColor' => "#fff",
            'pointHoverBorderColor' => "rgba(179,181,198,1)",
            "data" => []
        ];
        $months = [
            1 => 'Январь', 2 => 'Февраль',
            3 => 'Март', 4 => 'Апрель',
            5 => 'Май', 6 => 'Июнь',
            7 => 'Июль', 8 => 'Август',
            9 => 'Сентябрь', 10 => 'Октябрь',
            11 => 'Ноябрь', 12 => 'Декабрь',
        ];
        if(!empty($request['machine']) && !empty($request['month']) && !empty($request['year'])) {
            $machineoperation = (new \yii\db\Query())
                ->select(['id'])
                ->from('MachinesOperations')
                ->where(['machinesid' => $request['machine']])
                ->all();

            $rows = (new \yii\db\Query())
                ->select(['machineoperationid', 'SUM(`amount`) as count', 'DATE_FORMAT(`startdate`,"%d.%m.%Y") as group_date'])
                ->from('loading')
                ->where(['Month(startdate)' => $request['month'], 'Year(startdate)' => $request['year']])
                ->groupBy('group_date, machineoperationid')
                ->all();

            foreach ($rows as $row)
            {
                foreach ($machineoperation as $item) {
                    if($row['machineoperationid'] == $item['id'])
                    {
                        $labels[] = $row['group_date'];
                        $dataset['data'][] = $row['count'];
                    }
                }
            }
        }

        return $this->render('charts',[
            'machines' => Machines::find()->all(),
            'request' => $request,
            'labels' => $labels,
            'dataset' => $dataset,
            'months' => $months
        ]);

    }

    public function actionReports()
    {
        $model = new Loading();
        $request = Yii::$app->request->queryParams;
        $count = Yii::$app->db->createCommand('
                    SELECT COUNT(*) FROM Loading')->queryScalar();
        $months = [
            1 => 'Январь', 2 => 'Февраль',
            3 => 'Март', 4 => 'Апрель',
            5 => 'Май', 6 => 'Июнь',
            7 => 'Июль', 8 => 'Август',
            9 => 'Сентябрь', 10 => 'Октябрь',
            11 => 'Ноябрь', 12 => 'Декабрь',
        ];
        //print($request['machine']." ".$request['month']." ".$request['year']);
        if(!empty($request['machine']) && !empty($request['month']) && !empty($request['year'])) {
            $sql = "SELECT Machines.machinename as Machine, Operations.operationname as Operation, Orders.ordername as Orders, Details.detailname as Detail, SUM(Loading.amount) as count, DATE_FORMAT(`startdate`,\"%d.%m.%Y\") as Loaddate from Loading,Machines,MachinesOperations,Operations,Orders,Details,DetailsInOrder where MachinesOperations.id=Loading.machineoperationid and MachinesOperations.machinesid=Machines.id and Operations.id=MachinesOperations.operationid and Loading.ordereddetailsid=DetailsInOrder.id and DetailsInOrder.ordersid=Orders.id and DetailsInOrder.detailsid=Details.id and Machines.id=".$request['machine']." and Month(startdate)=".$request['month']." and Year(startdate)=".$request['year']." GROUP by Loaddate,machineoperationid";
        }
        else $sql = "SELECT Machines.machinename as Machine, Operations.operationname as Operation, Orders.ordername as Orders, Details.detailname as Detail, SUM(Loading.amount) as count, DATE_FORMAT(`startdate`,\"%d.%m.%Y\") as Loaddate from Loading,Machines,MachinesOperations,Operations,Orders,Details,DetailsInOrder where MachinesOperations.id=Loading.machineoperationid and MachinesOperations.machinesid=Machines.id and Operations.id=MachinesOperations.operationid and Loading.ordereddetailsid=DetailsInOrder.id and DetailsInOrder.ordersid=Orders.id and DetailsInOrder.detailsid=Details.id GROUP by Loaddate,machineoperationid";
        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
        ]);
        return $this->render('reports',
            [   'model'             => $model,
                'dataProvider'      => $dataProvider,
                'machines' => Machines::find()->all(),
                'request' => $request,
                'months' => $months
            ]);
    }
}