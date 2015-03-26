<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Departement;

/**
 * DepartementSearch represents the model behind the search form about `app\models\Departement`.
 */
class DepartementSearch extends Departement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dep_no', 'dep_name'], 'safe'],
            [['region_reg_no'], 'integer'],
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
        $query = Departement::find();

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
            'region_reg_no' => $this->region_reg_no,
        ]);

        $query->andFilterWhere(['like', 'dep_no', $this->dep_no])
            ->andFilterWhere(['like', 'dep_name', $this->dep_name]);

        return $dataProvider;
    }
}
