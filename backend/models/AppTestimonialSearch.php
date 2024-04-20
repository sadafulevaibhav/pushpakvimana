<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AppTestimonial;

/**
 * AppTestimonialSearch represents the model behind the search form about `backend\models\AppTestimonial`.
 */
class AppTestimonialSearch extends AppTestimonial
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'updated_by', 'company_id'], 'integer'],
            [['full_name', 'designation', 'email', 'comment', 'rating', 'testimonial_image', 'created_at', 'updated_at'], 'safe'],
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
        $query = AppTestimonial::find();

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
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'company_id' => $this->company_id,
        ]);

        $query->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'designation', $this->designation])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'rating', $this->rating])
            ->andFilterWhere(['like', 'testimonial_image', $this->testimonial_image]);

        return $dataProvider;
    }
}
