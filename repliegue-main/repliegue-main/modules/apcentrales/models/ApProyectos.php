<?php

namespace app\modules\apcentrales\models;

use Yii;

/**
 * This is the model class for table "ap_proyectos".
 *
 * @property int $idproyectos
 * @property int $num_cubicacion
 * @property string $oc
 * @property string $fec_asignacion
 * @property int $mts_proyectados_cable
 * @property int $kg_proyectados_cable
 * @property int|null $mts_reales
 * @property int|null $kg_reales
 * @property string|null $create_at
 * @property int $id_repliegue
 * @property int $id_subcontratistas
 * @property int $id_estados_proyecto
 *
 * @property ApChecklistsProyectos[] $apChecklistsProyectos
 * @property ApEstadosProyecto $estadosProyecto
 * @property ApRepliegue $repliegue
 * @property ApSubcontratistas $subcontratistas
 * @property ApProyectosPersonas[] $apProyectosPersonas
 * @property ApProyectosVehiculos[] $apProyectosVehiculos
 */
class ApProyectos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ap_proyectos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num_cubicacion', 'oc', 'fec_asignacion', 'mts_proyectados_cable', 'kg_proyectados_cable', 'id_repliegue', 'id_subcontratistas', 'id_estados_proyecto', 'rut_usuario', 'inspector_asignado'], 'required'],
            [['num_cubicacion', 'mts_proyectados_cable', 'kg_proyectados_cable', 'mts_reales', 'kg_reales', 'id_repliegue', 'id_subcontratistas', 'id_estados_proyecto', 'rut_usuario', 'inspector_asignado'], 'integer'],
            [['fec_asignacion', 'create_at'], 'safe'],
            [['oc'], 'string', 'max' => 200],
            [['id_estados_proyecto'], 'exist', 'skipOnError' => true, 'targetClass' => ApEstadosProyecto::className(), 'targetAttribute' => ['id_estados_proyecto' => 'id_estados_proyecto']],
            [['id_repliegue'], 'exist', 'skipOnError' => true, 'targetClass' => ApRepliegue::className(), 'targetAttribute' => ['id_repliegue' => 'id_repliegue']],
            [['id_subcontratistas'], 'exist', 'skipOnError' => true, 'targetClass' => ApSubcontratistas::className(), 'targetAttribute' => ['id_subcontratistas' => 'id_subcontratistas']],
            [['rut_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => CoreUsuario::className(), 'targetAttribute' => ['rut_usuario' => 'rut_usuario']],
            [['inspector_asignado'], 'exist', 'skipOnError' => true, 'targetClass' => CoreUsuario::className(), 'targetAttribute' => ['rut_usuario' => 'inspector_asignado']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idproyectos' => 'Idproyectos',
            'num_cubicacion' => 'Num Cubicacion',
            'oc' => 'Oc',
            'fec_asignacion' => 'Fec Asignacion',
            'mts_proyectados_cable' => 'Mts Proyectados Cable',
            'kg_proyectados_cable' => 'Kg Proyectados Cable',
            'mts_reales' => 'Mts Reales',
            'kg_reales' => 'Kg Reales',
            'create_at' => 'Create At',
            'id_repliegue' => 'Id Repliegue',
            'id_subcontratistas' => 'Id Subcontratistas',
            'id_estados_proyecto' => 'Id Estados Proyecto',
            'rut_usuario' => 'Creador Por',
            'inspector_asignado' => 'Inspector Asignado',
        ];
    }

    /**
     * Gets query for [[ApChecklistsProyectos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApChecklistsProyectos()
    {
        return $this->hasMany(ApChecklistsProyectos::className(), ['idproyectos' => 'idproyectos']);
    }

    /**
     * Gets query for [[EstadosProyecto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstadosProyecto()
    {
        return $this->hasOne(ApEstadosProyecto::className(), ['id_estados_proyecto' => 'id_estados_proyecto']);
    }

    public function getRutUsuario()
    {
        return $this->hasOne(CoreUsuario::className(), ['rut_usuario' => 'rut_usuario']);
    }

    public function getInspector()
    {
        return $this->hasOne(CoreUsuario::className(), ['rut_usuario' => 'inspector_asignado']);
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
     * Gets query for [[Subcontratistas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubcontratistas()
    {
        return $this->hasOne(ApSubcontratistas::className(), ['id_subcontratistas' => 'id_subcontratistas']);
    }

    /**
     * Gets query for [[ApProyectosPersonas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApProyectosPersonas()
    {
        return $this->hasMany(ApProyectosPersonas::className(), ['idproyectos' => 'idproyectos']);
    }

    /**
     * Gets query for [[ApProyectosVehiculos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApProyectosVehiculos()
    {
        return $this->hasMany(ApProyectosVehiculos::className(), ['idproyectos' => 'idproyectos']);
    }
}
