<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Places;

/**
 * PlacesSearch represents the model behind the search form about `backend\models\Places`.
 */
class PlacesSearch extends Places
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['place_id'], 'integer'],
            [['place_name', 'place_city_name'], 'safe'],
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
        $query = Places::find();

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
            'place_id' => $this->place_id,
        ]);

        $query->andFilterWhere(['like', 'place_name', $this->place_name])
            ->andFilterWhere(['like', 'place_city_name', $this->place_city_name]);

        return $dataProvider;
    }
}
