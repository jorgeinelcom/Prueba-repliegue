<?php

namespace app\modules\apcentrales\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\apcentrales\models\ApPersonas;

/**
 * ApPersonasSearch represents the model behind the search form of `app\modules\apcentrales\models\ApPersonas`.
 */
class ApPersonasSearch extends ApPersonas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idpersonas', 'rutPersona', 'id_subcontratistas', 'id_estados'], 'integer'],
            [['dvPersona', 'nombre', 'apellido', 'fono', 'correo'], 'safe'],
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
        $query = ApPersonas::find();

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
            'idpersonas' => $this->idpersonas,
            'rutPersona' => $this->rutPersona,
            'id_subcontratistas' => $this->id_subcontratistas,
            'id_estados' => $this->id_estados,
        ]);

        $query->andFilterWhere(['like', 'dvPersona', $this->dvPersona])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'fono', $this->fono])
            ->andFilterWhere(['like', 'correo', $this->correo]);

        return $dataProvider;
    }
}
