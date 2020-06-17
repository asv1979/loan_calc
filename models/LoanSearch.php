<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Loan;

/**
 * LoanSearch represents the model behind the search form of `app\models\Loan`.
 */
class LoanSearch extends Loan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sum', 'month_term', 'year_percent'], 'integer'],
            [['start_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Loan::find();

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
            'sum' => $this->sum,
            'month_term' => $this->month_term,
            'year_percent' => $this->year_percent,
        ]);

        $query->andFilterWhere(['like', 'start_date', $this->start_date]);

        return $dataProvider;
    }
}
