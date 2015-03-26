<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Commune;

/**
 * CommuneSearch represents the model behind the search form about `app\models\Commune`.
 */
class CommuneSearch extends Commune
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['com_code', 'com_name', 'epci', 'arrondissement_arr_code'], 'safe'],
            [['zone_demploi_zone_no'], 'integer'],
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
        $query = Commune::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'zone_demploi_zone_no' => $this->zone_demploi_zone_no,
        ]);

        $query->andFilterWhere(['like', 'com_code', $this->com_code])
            ->andFilterWhere(['like', 'com_name', $this->com_name])
            ->andFilterWhere(['like', 'epci', $this->epci])
            ->andFilterWhere(['like', 'arrondissement_arr_code', $this->arrondissement_arr_code]);

        return $dataProvider;
    }
}
