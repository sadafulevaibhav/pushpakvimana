<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BookerDetails;

/**
 * BookerDetailsSearch represents the model behind the search form about `common\models\BookerDetails`.
 */
class BookerDetailsSearch extends BookerDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'travellers_count'], 'integer'],
            [['full_name', 'email', 'mobile', 'whats_app', 'travel_destination', 'travel_date', 'vacation_type', 'created_date'], 'safe'],
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
        $query = BookerDetails::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'travel_date' => $this->travel_date,
            'travellers_count' => $this->travellers_count,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'whats_app', $this->whats_app])
            ->andFilterWhere(['like', 'travel_destination', $this->travel_destination])
            ->andFilterWhere(['like', 'vacation_type', $this->vacation_type]);

        return $dataProvider;
    }
}
