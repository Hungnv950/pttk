<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Booking;

/**
 * BookingSearch represents the model behind the search form about `common\models\Booking`.
 */
class BookingSearch extends Booking
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'table', 'table_type', 'eat_time', 'book_time', 'money_payed', 'cost'], 'integer'],
            [['employee_id', 'book_status'], 'safe'],
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
        $query = Booking::find();

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
            'user_id' => $this->user_id,
            'table' => $this->table,
            'table_type' => $this->table_type,
            'eat_time' => $this->eat_time,
            'book_time' => $this->book_time,
            'money_payed' => $this->money_payed,
            'cost' => $this->cost,
        ]);

        $query->andFilterWhere(['like', 'employee_id', $this->employee_id])
            ->andFilterWhere(['like', 'book_status', $this->book_status]);

        return $dataProvider;
    }
}
