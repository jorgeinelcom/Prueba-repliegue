<?php

namespace app\modules\armarios\models;

use Yii;

/**
 * This is the model class for table "sa_pallet".
 *
 * @property int $id_pallet
 * @property string|null $nombre
 * @property string|null $create_at
 * @property int $rut_usuario
 *
 * @property CoreUsuario $rutUsuario
 * @property SaRegistroBodega[] $saRegistroBodegas
 */
class SaPallet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sa_pallet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_at'], 'safe'],
            [['rut_usuario'], 'required'],
            [['rut_usuario'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['rut_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => CoreUsuario::className(), 'targetAttribute' => ['rut_usuario' => 'rut_usuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pallet' => 'Id Pallet',
            'nombre' => 'N° Pallet / N° Fardo',
            'create_at' => 'Create At',
            'rut_usuario' => 'Rut Usuario',
        ];
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
     * Gets query for [[SaRegistroBodegas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaRegistroBodegas()
    {
        return $this->hasMany(SaRegistroBodega::className(), ['id_pallet' => 'id_pallet']);
    }
}
