<?php

namespace app\modules\apcentrales\models;

use Yii;

/**
 * This is the model class for table "ap_proyectos_vehiculos".
 *
 * @property int $id_proyectos_vehiculos
 * @property string|null $create_at
 * @property int $idvehiculos
 * @property int $idproyectos
 * @property int $id_estados
 *
 * @property ApEstados $estados
 * @property ApProyectos $idproyectos0
 * @property ApVehiculos $idvehiculos0
 */
class ApProyectosVehiculos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ap_proyectos_vehiculos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idvehiculos', 'idproyectos', 'id_estados'], 'required'],
            [['idvehiculos', 'idproyectos', 'id_estados'], 'integer'],
            [['create_at'], 'string', 'max' => 45],
            [['id_estados'], 'exist', 'skipOnError' => true, 'targetClass' => ApEstados::className(), 'targetAttribute' => ['id_estados' => 'id_estados']],
            [['idproyectos'], 'exist', 'skipOnError' => true, 'targetClass' => ApProyectos::className(), 'targetAttribute' => ['idproyectos' => 'idproyectos']],
            [['idvehiculos'], 'exist', 'skipOnError' => true, 'targetClass' => ApVehiculos::className(), 'targetAttribute' => ['idvehiculos' => 'idvehiculos']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_proyectos_vehiculos' => 'Id Proyectos Vehiculos',
            'create_at' => 'Create At',
            'idvehiculos' => 'Idvehiculos',
            'idproyectos' => 'Idproyectos',
            'id_estados' => 'Id Estados',
        ];
    }

    /**
     * Gets query for [[Estados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstados()
    {
        return $this->hasOne(ApEstados::className(), ['id_estados' => 'id_estados']);
    }

    /**
     * Gets query for [[Idproyectos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdproyectos0()
    {
        return $this->hasOne(ApProyectos::className(), ['idproyectos' => 'idproyectos']);
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
