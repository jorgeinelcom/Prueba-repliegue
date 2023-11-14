<?php

namespace app\modules\apcentrales\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\apcentrales\models\ApSubcontratistas;

/**
 * ApSubcontratistasSearch represents the model behind the search form of `app\modules\apcentrales\models\ApSubcontratistas`.
 */
class ApSubcontratistasSearch extends ApSubcontratistas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_subcontratistas', 'precio_aereo', 'precio_matriz'], 'integer'],
            [['nombre', 'create_at'], 'safe'],
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
        $query = ApSubcontratistas::find();

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
            'id_subcontratistas' => $this->id_subcontratistas,
            'create_at' => $this->create_at,
            'precio_aereo' => $this->precio_aereo,
            'precio_matriz' => $this->precio_matriz,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
