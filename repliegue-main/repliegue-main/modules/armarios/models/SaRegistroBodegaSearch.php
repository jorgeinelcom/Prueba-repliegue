<?php

namespace app\modules\armarios\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\armarios\models\SaRegistroBodega;

/**
 * SaRegistroBodegaSearch represents the model behind the search form of `app\modules\armarios\models\SaRegistroBodega`.
 */
class SaRegistroBodegaSearch extends SaRegistroBodega
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registro_bodega', 'rut_usuario'], 'integer'],
            [['id', 'fecha_repliegue', 'create_at', 'id_bodega' , 'id_pallet' , 'id_armario' , 'id_repliegue'], 'safe'],
            [['kilos_cu', 'trozos', 'peso_pallet'], 'number'],
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
        $query = SaRegistroBodega::find();

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

        $query->joinWith('bodega bd');
        $query->joinWith('repliegue rp');
        $query->joinWith('pallet p');
        $query->joinWith('armario am');

        // grid filtering conditions
        $query->andFilterWhere([
            'rut_usuario' => $this->rut_usuario,
        ]);

        $query->andFilterWhere(['like', 'bd.nombre', $this->id_bodega])
        ->andFilterWhere(['like', 'id', $this->id])
        ->andFilterWhere(['like', 'rp.descripcion', $this->id_repliegue])
        ->andFilterWhere(['like', 'p.nombre', $this->id_pallet])
        ->andFilterWhere(['like', 'DATE_FORMAT(fecha_repliegue, "%d-%m-%Y")', $this->fecha_repliegue])
        ->andFilterWhere(['like', 'am.descripcion', $this->id_armario])
        ->andFilterWhere(['like', 'trozos', $this->trozos])
        ->andFilterWhere(['like', 'peso_pallet', $this->peso_pallet])
        ->andFilterWhere(['like', 'kilos_cu', $this->kilos_cu])
     
        ;

        return $dataProvider;
    }
}
