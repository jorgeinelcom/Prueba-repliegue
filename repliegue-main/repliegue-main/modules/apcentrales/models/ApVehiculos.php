<?php

namespace app\modules\apcentrales\models;

use Yii;

/**
 * This is the model class for table "ap_vehiculos".
 *
 * @property int $idvehiculos
 * @property string $patente
 * @property string $marca
 * @property string|null $modelo
 * @property string|null $color
 * @property int|null $anio
 * @property string|null $create_at
 * @property int|null $idSubcontratista
 *
 * @property ApProyectosVehiculos[] $apProyectosVehiculos
 * @property ApSubcontratistas $idSubcontratista0
 */
class ApVehiculos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ap_vehiculos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patente', 'marca', 'id_subcontratistas'], 'required'],
            [['anio', 'id_subcontratistas'], 'integer'],
            [['patente', 'id_subcontratistas'], 'unique', 'message' => 'Este vehiculo ya existe' , 'targetAttribute' => [ 'id_subcontratistas']],
            [['create_at'], 'safe'],
            [['patente'], 'string', 'max' => 45],
            [['marca', 'color'], 'string', 'max' => 100],
            [['modelo'], 'string', 'max' => 200],
            [['id_subcontratistas'], 'exist', 'skipOnError' => true, 'targetClass' => ApSubcontratistas::className(), 'targetAttribute' => ['id_subcontratistas' => 'id_subcontratistas']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idvehiculos' => 'Idvehiculos',
            'patente' => 'Patente',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'color' => 'Color',
            'anio' => 'Anio',
            'create_at' => 'Create At',
            'id_subcontratistas' => 'Id Subcontratista',
        ];
    }

    /**
     * Gets query for [[ApProyectosVehiculos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApProyectosVehiculos()
    {
        return $this->hasMany(ApProyectosVehiculos::className(), ['idvehiculos' => 'idvehiculos']);
    }

    /**
     * Gets query for [[IdSubcontratista0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdSubcontratista0()
    {
        return $this->hasOne(ApSubcontratistas::className(), ['id_subcontratistas' => 'id_subcontratistas']);
    }
}
