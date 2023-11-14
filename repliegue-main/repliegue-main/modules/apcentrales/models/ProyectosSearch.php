<?php

namespace app\modules\apcentrales\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\apcentrales\models\ApProyectos;

/**
 * ProyectosSearch represents the model behind the search form of `app\modules\apcentrales\models\ApProyectos`.
 */
class ProyectosSearch extends ApProyectos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idproyectos', 'num_cubicacion', 'mts_proyectados_cable', 'kg_proyectados_cable', 'mts_reales', 'kg_reales', 'id_repliegue', 'id_subcontratistas', 'id_estados_proyecto'], 'integer'],
            [['oc', 'fec_asignacion', 'create_at'], 'safe'],
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
        $query = ApProyectos::find();

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
            'idproyectos' => $this->idproyectos,
            'num_cubicacion' => $this->num_cubicacion,
            'fec_asignacion' => $this->fec_asignacion,
            'mts_proyectados_cable' => $this->mts_proyectados_cable,
            'kg_proyectados_cable' => $this->kg_proyectados_cable,
            'mts_reales' => $this->mts_reales,
            'kg_reales' => $this->kg_reales,
            'create_at' => $this->create_at,
            'id_repliegue' => $this->id_repliegue,
            'id_subcontratistas' => $this->id_subcontratistas,
            'id_estados_proyecto' => $this->id_estados_proyecto,
        ]);

        $query->andFilterWhere(['like', 'oc', $this->oc]);

        return $dataProvider;
    }
}
