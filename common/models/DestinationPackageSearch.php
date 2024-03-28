<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DestinationPackage;

/**
 * DestinationPackageSearch represents the model behind the search form about `common\models\DestinationPackage`.
 */
class DestinationPackageSearch extends DestinationPackage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hotel_rating', 'country_id', 'package_id'], 'integer'],
            [['package_name', 'package_image', 'about_trip', 'max_no_guests', 'package_addons', 'key_locations'], 'safe'],
            [['travel_expenses'], 'number'],
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
        $query = DestinationPackage::find();

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
            'hotel_rating' => $this->hotel_rating,
            'travel_expenses' => $this->travel_expenses,
            'country_id' => $this->country_id,
            'package_id' => $this->package_id,
        ]);

        $query->andFilterWhere(['like', 'package_name', $this->package_name])
            ->andFilterWhere(['like', 'package_image', $this->package_image])
            ->andFilterWhere(['like', 'about_trip', $this->about_trip])
            ->andFilterWhere(['like', 'max_no_guests', $this->max_no_guests])
            ->andFilterWhere(['like', 'package_addons', $this->package_addons])
            ->andFilterWhere(['like', 'key_locations', $this->key_locations]);

        return $dataProvider;
    }
}
