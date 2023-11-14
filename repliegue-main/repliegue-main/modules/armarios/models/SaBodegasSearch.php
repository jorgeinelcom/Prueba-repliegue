<?php

namespace app\modules\armarios\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\armarios\models\SaBodegas;

/**
 * SaBodegasSearch represents the model behind the search form of `app\modules\armarios\models\SaBodegas`.
 */
class SaBodegasSearch extends SaBodegas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bodegas'], 'integer'],
            [['nombre', 'direccion'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = SaBodegas::find();

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
            'id_bodegas' => $this->id_bodegas,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'direccion', $this->direccion]);

        return $dataProvider;
    }
}
