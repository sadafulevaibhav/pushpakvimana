<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TourItinerary;

/**
 * TourItinerarySearch represents the model behind the search form about `common\models\TourItinerary`.
 */
class TourItinerarySearch extends TourItinerary
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country_id', 'package_id'], 'integer'],
            [['itinerary_day', 'activities'], 'safe'],
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
        $query = TourItinerary::find();

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
            'country_id' => $this->country_id,
            'package_id' => $this->package_id,
        ]);

        $query->andFilterWhere(['like', 'itinerary_day', $this->itinerary_day])
            ->andFilterWhere(['like', 'activities', $this->activities]);

        return $dataProvider;
    }
}
