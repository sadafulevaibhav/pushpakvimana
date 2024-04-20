<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TourDetail;

/**
 * TourDetailSearch represents the model behind the search form about `common\models\TourDetail`.
 */
class TourDetailSearch extends TourDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'package_id'], 'integer'],
            [['tour_start_date', 'tour_end_date', 'tour_origin', 'tour_destination'], 'safe'],
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
        $query = TourDetail::find();

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
            'tour_start_date' => $this->tour_start_date,
            'tour_end_date' => $this->tour_end_date,
            'package_id' => $this->package_id,
        ]);

        $query->andFilterWhere(['like', 'tour_origin', $this->tour_origin])
            ->andFilterWhere(['like', 'tour_destination', $this->tour_destination]);

        return $dataProvider;
    }
}
