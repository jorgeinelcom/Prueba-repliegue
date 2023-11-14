<?php

namespace app\modules\Access\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\Access\models\AccessControl;




class AccessControlSearch extends AccessControl
{

  public function rules()
  {
      return [

          [['fecha'], 'safe'],
          [['rut_usuario', 'username', 'id_interaction'], 'string'],
      ];
  }


  public function scenarios()
  {
    return Model::scenarios();
  }

  public function search($params)
  {

    $query = AccessControl::find()->orderBy(['id_access' => SORT_DESC]);


    $dataProvider = new ActiveDataProvider([
      'query' => $query,
    ]);

    $this->load($params);

    if(!$this->validate()){
      return $dataProvider;
    }

    $query->joinWith('interaction in');


    $query->andFilterWhere([
      'id_access' => $this->id_access
    ]);

    $query->andFilterWhere(['like', 'username', $this->username])
    ->andFilterWhere(['like', 'rut_usuario', $this->rut_usuario])
    ->andFilterWhere(['like', 'in.name', $this->id_interaction]);



    return $dataProvider;
  }


}
