<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Packages;

/**
 * PackagesSearch represents the model behind the search form about `backend\models\Packages`.
 */
class PackagesSearch extends Packages
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['package_id', 'package_days', 'places_place_id', 'package_total_amount'], 'integer'],
            [['package_name'], 'safe'],
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
        $query = Packages::find();

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
            'package_id' => $this->package_id,
            'package_days' => $this->package_days,
            'places_place_id' => $this->places_place_id,
            'package_total_amount' => $this->package_total_amount,
        ]);

        $query->andFilterWhere(['like', 'package_name', $this->package_name]);

        return $dataProvider;
    }
}
