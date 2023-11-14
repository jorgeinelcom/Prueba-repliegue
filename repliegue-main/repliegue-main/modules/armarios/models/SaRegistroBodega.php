<?php

namespace app\modules\armarios\models;

use Yii;

/**
 * This is the model class for table "sa_registro_bodega".
 *
 * @property int $id_registro_bodega
 * @property int $id_bodega
 * @property string|null $id
 * @property int $id_repliegue
 * @property int $id_pallet
 * @property int $id_armario
 * @property string|null $fecha_repliegue
 * @property float|null $kilos_cu
 * @property float|null $trozos
 * @property float|null $peso_pallet
 * @property int $rut_usuario
 * @property string|null $create_at
 * @property int|null $id_oc
 * @property float|null $peso_neto
 * @property int|null $id_estado
 *
 * @property SaBodegas $bodega
 * @property SaEstadoRetiro $estado
 * @property SaOc $oc
 * @property SaArmario $armario
 * @property SaPallet $pallet
 * @property ApRepliegue $repliegue
 * @property CoreUsuario $rutUsuario
 * @property SaRetiro[] $saRetiros
 */
class SaRegistroBodega extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sa_registro_bodega';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bodega', 'id_repliegue', 'id_pallet', 'id_armario', 'rut_usuario'], 'required'],
            [['id_bodega', 'id_repliegue', 'rut_usuario', 'id_oc', 'id_estado'], 'integer'],
            [['fecha_repliegue', 'create_at', 'id_armario', 'id_pallet'], 'safe'],
            [['kilos_cu', 'trozos', 'peso_pallet', 'peso_neto'], 'number'],
            [['id', 'id_autorizacion'], 'string', 'max' => 45],
            [['id_bodega'], 'exist', 'skipOnError' => true, 'targetClass' => SaBodegas::className(), 'targetAttribute' => ['id_bodega' => 'id_bodegas']],
            [['id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => SaEstadoRetiro::className(), 'targetAttribute' => ['id_estado' => 'id_estado_retiro']],
            [['id_oc'], 'exist', 'skipOnError' => true, 'targetClass' => SaOc::className(), 'targetAttribute' => ['id_oc' => 'id_oc']],
            [['id_armario'], 'exist', 'skipOnError' => true, 'targetClass' => SaArmario::className(), 'targetAttribute' => ['id_armario' => 'id_armario']],
            [['id_pallet'], 'exist', 'skipOnError' => true, 'targetClass' => SaPallet::className(), 'targetAttribute' => ['id_pallet' => 'id_pallet']],
            [['id_repliegue'], 'exist', 'skipOnError' => true, 'targetClass' => ApRepliegue::className(), 'targetAttribute' => ['id_repliegue' => 'id_repliegue']],
            [['rut_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => CoreUsuario::className(), 'targetAttribute' => ['rut_usuario' => 'rut_usuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_registro_bodega' => 'Id Registro Bodega',
            'id_bodega' => 'Id Bodega',
            'id' => 'ID',
            'id_repliegue' => 'Id Repliegue',
            'id_pallet' => 'Id Pallet',
            'id_armario' => 'Id Armario',
            'fecha_repliegue' => 'Fecha Repliegue',
            'kilos_cu' => 'Kilos Cu',
            'trozos' => 'Trozos',
            'peso_pallet' => 'Peso Pallet',
            'rut_usuario' => 'Rut Usuario',
            'create_at' => 'Create At',
            'id_oc' => 'Id Oc',
            'peso_neto' => 'Peso Neto',
            'id_estado' => 'Id Estado',
        ];
    }

    /**
     * Gets query for [[Bodega]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBodega()
    {
        return $this->hasOne(SaBodegas::className(), ['id_bodegas' => 'id_bodega']);
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
     * Gets query for [[Oc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOc()
    {
        return $this->hasOne(SaOc::className(), ['id_oc' => 'id_oc']);
    }

    /**
     * Gets query for [[Armario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArmario()
    {
        return $this->hasOne(SaArmario::className(), ['id_armario' => 'id_armario']);
    }

    /**
     * Gets query for [[Pallet]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPallet()
    {
        return $this->hasOne(SaPallet::className(), ['id_pallet' => 'id_pallet']);
    }

    /**
     * Gets query for [[Repliegue]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRepliegue()
    {
        return $this->hasOne(ApRepliegue::className(), ['id_repliegue' => 'id_repliegue']);
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

    /**
     * Gets query for [[SaRetiros]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaRetiros()
    {
        return $this->hasMany(SaRetiro::className(), ['id_registro_bodega' => 'id_registro_bodega']);
    }
}
