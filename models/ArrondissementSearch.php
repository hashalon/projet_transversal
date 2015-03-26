<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Arrondissement;

/**
 * ArrondissementSearch represents the model behind the search form about `app\models\Arrondissement`.
 */
class ArrondissementSearch extends Arrondissement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['arr_code', 'arr_name', 'departement_dep_no'], 'safe'],
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
        $query = Arrondissement::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'arr_code', $this->arr_code])
            ->andFilterWhere(['like', 'arr_name', $this->arr_name])
            ->andFilterWhere(['like', 'departement_dep_no', $this->departement_dep_no]);

        return $dataProvider;
    }
}
