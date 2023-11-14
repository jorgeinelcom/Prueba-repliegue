<?php

namespace app\modules\armarios\models;

use Yii;

/**
 * This is the model class for table "sa_retiro".
 *
 * @property int $id_retiro
 * @property int $id_registro_bodega
 * @property int|null $lote
 * @property int|null $retiro
 * @property int|null $guia_despacho
 * @property string|null $fecha_entrega
 * @property float|null $peso_total_telefonica
 * @property float|null $peso_neto_cable
 * @property float|null $diferencia
 * @property string|null $destino_entrega
 * @property int|null $acta_servicio
 * @property string|null $fecha_acta
 * @property int $id_estado
 * @property float|null $kg_bodega_inelcom
 * @property int|null $rut_usuario
 * @property string|null $create_at
 *
 * @property SaEstadoRetiro $estado
 * @property SaRegistroBodega $registroBodega
 * @property CoreUsuario $rutUsuario
 */
class SaRetiro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sa_retiro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_registro_bodega', 'id_estado'], 'required'],
            [['id_registro_bodega', 'lote', 'retiro', 'guia_despacho', 'acta_servicio', 'id_estado', 'rut_usuario'], 'integer'],
            [['fecha_entrega', 'fecha_acta', 'create_at'], 'safe'],
            [['peso_total_telefonica', 'peso_neto_cable', 'diferencia', 'kg_bodega_inelcom'], 'number'],
            [['destino_entrega'], 'string', 'max' => 200],
            [['id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => SaEstadoRetiro::className(), 'targetAttribute' => ['id_estado' => 'id_estado_retiro']],
            [['id_registro_bodega'], 'exist', 'skipOnError' => true, 'targetClass' => SaRegistroBodega::className(), 'targetAttribute' => ['id_registro_bodega' => 'id_registro_bodega']],
            [['rut_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => CoreUsuario::className(), 'targetAttribute' => ['rut_usuario' => 'rut_usuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_retiro' => 'Id Retiro',
            'id_registro_bodega' => 'Id Registro Bodega',
            'lote' => 'Lote',
            'retiro' => 'Retiro',
            'guia_despacho' => 'Guia Despacho',
            'fecha_entrega' => 'Fecha Entrega',
            'peso_total_telefonica' => 'Peso Total Telefonica',
            'peso_neto_cable' => 'Peso Neto Cable',
            'diferencia' => 'Diferencia',
            'destino_entrega' => 'Destino Entrega',
            'acta_servicio' => 'Acta Servicio',
            'fecha_acta' => 'Fecha Acta',
            'id_estado' => 'Id Estado',
            'kg_bodega_inelcom' => 'Kg Bodega Inelcom',
            'rut_usuario' => 'Rut Usuario',
            'create_at' => 'Create At',
        ];
    }

    /**
     * Gets query for [[Estado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(SaEstadoRetiro::className(), ['id_estado_retiro' => 'id_estado']);
    }

    /**
     * Gets query for [[RegistroBodega]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegistroBodega()
    {
        return $this->hasOne(SaRegistroBodega::className(), ['id_registro_bodega' => 'id_registro_bodega']);
    }

    /**
     * Gets query for [[RutUsuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRutUsuario()
    {
        return $this->hasOne(CoreUsuario::className(), ['rut_usuario' => 'rut_usuario']);
    }
}
