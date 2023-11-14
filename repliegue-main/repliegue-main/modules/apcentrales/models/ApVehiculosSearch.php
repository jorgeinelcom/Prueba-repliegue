<?php

namespace app\modules\apcentrales\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\apcentrales\models\ApVehiculos;

/**
 * ApVehiculosSearch represents the model behind the search form of `app\modules\apcentrales\models\ApVehiculos`.
 */
class ApVehiculosSearch extends ApVehiculos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idvehiculos', 'anio', 'id_subcontratistas'], 'integer'],
            [['patente', 'marca', 'modelo', 'color', 'create_at'], 'safe'],
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
        $query = ApVehiculos::find();

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
            'idvehiculos' => $this->idvehiculos,
            'anio' => $this->anio,
        ]);

        $query->andFilterWhere(['like', 'patente', $this->patente])
            ->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'modelo', $this->modelo])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'create_at', $this->create_at]);

        return $dataProvider;
    }
}
