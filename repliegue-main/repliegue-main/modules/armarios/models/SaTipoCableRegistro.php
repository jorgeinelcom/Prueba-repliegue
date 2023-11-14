<?php

namespace app\modules\armarios\models;

use Yii;

/**
 * This is the model class for table "sa_tipo_cable_registro".
 *
 * @property int $id_tipo_cable_registro
 * @property string|null $create_at
 * @property int $rutUsuario
 * @property int $id_tipo_cable
 * @property int $id_registro_bodega
 * @property float $peso
 *
 * @property SaRegistroBodega $registroBodega
 * @property SaTipoCable $tipoCable
 * @property CoreUsuario $rutUsuario0
 */
class SaTipoCableRegistro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sa_tipo_cable_registro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_at'], 'safe'],
            [['rutUsuario', 'id_tipo_cable', 'id_registro_bodega', 'peso'], 'required'],
            [['rutUsuario', 'id_tipo_cable', 'id_registro_bodega'], 'integer'],
            [['peso'], 'number'],
            [['id_registro_bodega'], 'exist', 'skipOnError' => true, 'targetClass' => SaRegistroBodega::className(), 'targetAttribute' => ['id_registro_bodega' => 'id_registro_bodega']],
            [['id_tipo_cable'], 'exist', 'skipOnError' => true, 'targetClass' => SaTipoCable::className(), 'targetAttribute' => ['id_tipo_cable' => 'id_tipo_cable']],
            [['rutUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => CoreUsuario::className(), 'targetAttribute' => ['rutUsuario' => 'rut_usuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_cable_registro' => 'Id Tipo Cable Registro',
            'create_at' => 'Create At',
            'rutUsuario' => 'Rut Usuario',
            'id_tipo_cable' => 'Id Tipo Cable',
            'id_registro_bodega' => 'Id Registro Bodega',
            'peso' => 'Peso',
        ];
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
     * Gets query for [[TipoCable]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoCable()
    {
        return $this->hasOne(SaTipoCable::className(), ['id_tipo_cable' => 'id_tipo_cable']);
    }

    /**
     * Gets query for [[RutUsuario0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRutUsuario0()
    {
        return $this->hasOne(CoreUsuario::className(), ['rut_usuario' => 'rutUsuario']);
    }
}
