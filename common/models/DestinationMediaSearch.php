<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DestinationMedia;

/**
 * DestinationMediaSearch represents the model behind the search form about `common\models\DestinationMedia`.
 */
class DestinationMediaSearch extends DestinationMedia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country_id', 'package_id'], 'integer'],
            [['content_text', 'media_file', 'media_type'], 'safe'],
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
        $query = DestinationMedia::find();

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

        $query->andFilterWhere(['like', 'content_text', $this->content_text])
            ->andFilterWhere(['like', 'media_file', $this->media_file])
            ->andFilterWhere(['like', 'media_type', $this->media_type]);

        return $dataProvider;
    }
}
