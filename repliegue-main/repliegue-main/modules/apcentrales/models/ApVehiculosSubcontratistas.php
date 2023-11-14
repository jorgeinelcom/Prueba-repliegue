<?php

namespace app\modules\apcentrales\models;

use Yii;

/**
 * This is the model class for table "ap_vehiculos_subcontratistas".
 *
 * @property int $id_vehiculos_subcontratistas
 * @property int $id_subcontratistas
 * @property int $idvehiculos
 * @property int $ap_estados_id_estados
 * @property string|null $create_at
 *
 * @property ApEstados $apEstadosIdEstados
 * @property ApSubcontratistas $subcontratistas
 * @property ApVehiculos $idvehiculos0
 */
class ApVehiculosSubcontratistas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ap_vehiculos_subcontratistas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_subcontratistas', 'idvehiculos', 'ap_estados_id_estados'], 'required'],
            [['id_subcontratistas', 'idvehiculos', 'ap_estados_id_estados'], 'integer'],
            [['create_at'], 'safe'],
            [['ap_estados_id_estados'], 'exist', 'skipOnError' => true, 'targetClass' => ApEstados::className(), 'targetAttribute' => ['ap_estados_id_estados' => 'id_estados']],
            [['id_subcontratistas'], 'exist', 'skipOnError' => true, 'targetClass' => ApSubcontratistas::className(), 'targetAttribute' => ['id_subcontratistas' => 'id_subcontratistas']],
            [['idvehiculos'], 'exist', 'skipOnError' => true, 'targetClass' => ApVehiculos::className(), 'targetAttribute' => ['idvehiculos' => 'idvehiculos']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_vehiculos_subcontratistas' => 'Id Vehiculos Subcontratistas',
            'id_subcontratistas' => 'Id Subcontratistas',
            'idvehiculos' => 'Idvehiculos',
            'ap_estados_id_estados' => 'Ap Estados Id Estados',
            'create_at' => 'Create At',
        ];
    }

    /**
     * Gets query for [[ApEstadosIdEstados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApEstadosIdEstados()
    {
        return $this->hasOne(ApEstados::className(), ['id_estados' => 'ap_estados_id_estados']);
    }

    /**
     * Gets query for [[Subcontratistas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubcontratistas()
    {
        return $this->hasOne(ApSubcontratistas::className(), ['id_subcontratistas' => 'id_subcontratistas']);
    }

    /**
     * Gets query for [[Idvehiculos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdvehiculos0()
    {
        return $this->hasOne(ApVehiculos::className(), ['idvehiculos' => 'idvehiculos']);
    }
}
