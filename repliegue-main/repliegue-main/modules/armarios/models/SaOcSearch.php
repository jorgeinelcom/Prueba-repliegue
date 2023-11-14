<?php

namespace app\modules\armarios\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\armarios\models\SaOc;

/**
 * SaOcSearch represents the model behind the search form of `app\modules\armarios\models\SaOc`.
 */
class SaOcSearch extends SaOc
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_oc'], 'integer'],
            [['descripcion', 'nombre', 'omonimo', 'create_at', 'id_agencia', 'id_comuna'], 'safe'],
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
        $query = SaOc::find();

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

        $query->joinWith('agencia ag');
        $query->joinWith('comuna cm');

        // grid filtering conditions
        $query->andFilterWhere([
            'id_oc' => $this->id_oc,
            'create_at' => $this->create_at,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'ag.nombre', $this->id_agencia])
            ->andFilterWhere(['like', 'cm.nombre', $this->id_comuna])
            ->andFilterWhere(['like', 'omonimo', $this->omonimo]);

        return $dataProvider;
    }
}
