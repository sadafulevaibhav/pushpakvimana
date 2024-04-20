<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TravelerBooking;

/**
 * TravelerBookingSearch represents the model behind the search form about `common\models\TravelerBooking`.
 */
class TravelerBookingSearch extends TravelerBooking
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'traveler_age', 'group_id', 'package_id', 'tour_detail_id'], 'integer'],
            [['traveler_name', 'traveler_gender', 'traveler_passport', 'booking_date'], 'safe'],
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
        $query = TravelerBooking::find();

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
            'traveler_age' => $this->traveler_age,
            'booking_date' => $this->booking_date,
            'group_id' => $this->group_id,
            'package_id' => $this->package_id,
            'tour_detail_id' => $this->tour_detail_id,
        ]);

        $query->andFilterWhere(['like', 'traveler_name', $this->traveler_name])
            ->andFilterWhere(['like', 'traveler_gender', $this->traveler_gender])
            ->andFilterWhere(['like', 'traveler_passport', $this->traveler_passport]);

        return $dataProvider;
    }
}
