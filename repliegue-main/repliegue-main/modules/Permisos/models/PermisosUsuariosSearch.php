<?php

namespace app\modules\Permisos\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\Permisos\models\PermisosUsuarios;

/**
 * PermisosUsuariosSearch represents the model behind the search form of `app\modules\Permisos\models\PermisosUsuarios`.
 */
class PermisosUsuariosSearch extends PermisosUsuarios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_permisos_usuarios'], 'integer'],
            [['created_at', 'rut_usuario','id_permiso'], 'safe'],
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
        $query = PermisosUsuarios::find();

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



        $query->joinwith('permiso p');
        $query->joinwith('rutUsuario u');
        // grid filtering conditions
        $query->andFilterWhere([
            'id_permisos_usuarios' => $this->id_permisos_usuarios,
            // 'id_permiso' => $this->id_permiso,
            // 'rut_usuario' => $this->rut_usuario,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'u.nombre', $this->rut_usuario])
        ->andFilterWhere(['like', 'p.nombre', $this->id_permiso]);

        return $dataProvider;
    }
}
