<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Machines;

/**
 * MachinesSearch represents the model behind the search form of `app\models\Machines`.
 */
class MachinesSearch extends Machines
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'machinestypeid', 'statusid', 'stateid'], 'integer'],
            [['machinename', 'description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Machines::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'machinestypeid' => $this->machinestypeid,
            'statusid' => $this->statusid,
            'stateid' => $this->stateid,
        ]);

        $query->andFilterWhere(['like', 'machinename', $this->machinename])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
