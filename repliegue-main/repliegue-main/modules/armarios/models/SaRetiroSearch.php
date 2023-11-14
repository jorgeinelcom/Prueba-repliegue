<?php

namespace app\modules\armarios\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\armarios\models\SaRetiro;

/**
 * SaRetiroSearch represents the model behind the search form of `app\modules\armarios\models\SaRetiro`.
 */
class SaRetiroSearch extends SaRetiro
{
    /**
     * {@inheritdoc}
     */
    public $bodega;
    public $pallet;
    public $armario;
    public $fec_repliegue;
    public $kg_cu;
    public $trozos;
    public $peso_pallet;

    public function rules()
    {
        return [
            [['id_retiro', 'id_registro_bodega', 'lote', 'retiro', 'guia_despacho', 'acta_servicio', 'id_estado', 'rut_usuario'], 'integer'],
            [['fecha_entrega', 'destino_entrega', 'fecha_acta', 'create_at', 'bodega', 'pallet', 'fec_repliegue', 'armario'], 'safe'],
            [['peso_total_telefonica', 'peso_neto_cable', 'diferencia', 'kg_bodega_inelcom', 'kg_cu','trozos','peso_pallet'], 'number'],
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
        $query = SaRetiro::find();

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

        $query->joinWith('registroBodega bg');
        $query->joinWith('registroBodega.bodega b');
        $query->joinWith('registroBodega.pallet p');
        $query->joinWith('registroBodega.armario a');

        $dataProvider->setSort([
            'attributes' => [
            'bodega' => 
            [
                    'asc' => ['b.nombre' => SORT_ASC],
                    'desc' => ['b.nombre' => SORT_DESC],
                    'label' => 'Bodega',
                    'default' => SORT_ASC
                ],
            'pallet' => 
            [
                    'asc' => ['p.nombre' => SORT_ASC],
                    'desc' => ['p.nombre' => SORT_DESC],
                    'label' => 'Pallet',
                    'default' => SORT_ASC
                ],
                'armario' => [
                    'asc' => ['a.descripcion' => SORT_ASC],
                    'desc' => ['a.descripcion' => SORT_DESC],
                    'label' => 'Armario',
                    'default' => SORT_ASC
                ],
                'fec_repliegue' => [
                    'asc' => ['bg.fecha_repliegue' => SORT_ASC],
                    'desc' => ['bg.fecha_repliegue' => SORT_DESC],
                    'label' => 'Fecha Repliegue',
                    'default' => SORT_ASC
                ],
                 'trozos' => [
                    'asc' => ['bg.trozos' => SORT_ASC],
                    'desc' => ['bg.trozos' => SORT_DESC],
                    'label' => 'Trozos',
                    'default' => SORT_ASC
                ],
                'peso_pallet' => [
                   'asc' => ['bg.peso_pallet' => SORT_ASC],
                   'desc' => ['bg.peso_pallet' => SORT_DESC],
                   'label' => 'peso_pallet',
                   'default' => SORT_ASC
               ],
               'kg_cu' => [
                  'asc' => ['bg.kilos_cu' => SORT_ASC],
                  'desc' => ['bg.kilos_cu' => SORT_DESC],
                  'label' => 'Kilos Cu',
                  'default' => SORT_ASC
               ],
               'retiro' => [
                'asc' => ['retiro' => SORT_ASC],
                'desc' => ['retiro' => SORT_DESC],
                'label' => 'Retiro',
                'default' => SORT_ASC
               ],
               'fecha_entrega' => [
                'asc' => ['fecha_entrega' => SORT_ASC],
                'desc' => ['fecha_entrega' => SORT_DESC],
                'label' => 'Kilos Cu',
                'default' => SORT_ASC
               ],
               'peso_total_telefonica' => [
                'asc' => ['peso_total_telefonica' => SORT_ASC],
                'desc' => ['peso_total_telefonica' => SORT_DESC],
                'label' => 'Peso Total Telefonica',
                'default' => SORT_ASC
               ],
               'peso_neto_cable' => [
                'asc' => ['peso_neto_cable' => SORT_ASC],
                'desc' => ['peso_neto_cable' => SORT_DESC],
                'label' => 'Peso neto',
                'default' => SORT_ASC
               ],
               'diferencia' => [
                'asc' => ['diferencia' => SORT_ASC],
                'desc' => ['diferencia' => SORT_DESC],
                'label' => 'diferencia',
                'default' => SORT_ASC
               ],
               'destino_entrega' => [
                'asc' => ['destino_entrega' => SORT_ASC],
                'desc' => ['destino_entrega' => SORT_DESC],
                'label' => 'destino_entrega',
                'default' => SORT_ASC
               ]
               
    
            ]
        ]);


        // grid filtering conditions
 
        $query->andFilterWhere(['like', 'destino_entrega', $this->destino_entrega])
        ->andFilterWhere(['like', 'b.nombre', $this->bodega])
        ->andFilterWhere(['like', 'p.nombre', $this->pallet])
        ->andFilterWhere(['like', 'a.descripcion', $this->armario])
        ->andFilterWhere(['like', 'DATE_FORMAT(bg.fecha_repliegue, "%d-%m-%Y")', $this->fec_repliegue])
        ->andFilterWhere(['like', 'bg.kilos_cu', $this->kg_cu])
        ->andFilterWhere(['like', 'bg.trozos', $this->trozos])
        ->andFilterWhere(['like', 'bg.peso_pallet', $this->peso_pallet])
        ->andFilterWhere(['like', 'peso_total_telefonica', $this->peso_total_telefonica])
        ->andFilterWhere(['like', 'DATE_FORMAT(fecha_entrega, "%d-%m-%Y")', $this->fecha_entrega])
        ->andFilterWhere(['like', 'retiro', $this->retiro])
        ->andFilterWhere(['like', 'peso_neto_cable', $this->peso_neto_cable])
        ->andFilterWhere(['like', 'diferencia', $this->diferencia])
        ->andFilterWhere(['like', 'destino_entrega', $this->destino_entrega]);

        return $dataProvider;
    }
}
