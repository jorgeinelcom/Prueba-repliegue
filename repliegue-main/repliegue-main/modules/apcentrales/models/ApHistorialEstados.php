<?php

namespace app\modules\apcentrales\models;

use Yii;

/**
 * This is the model class for table "ap_historial_estados".
 *
 * @property int $id_historial_estados
 * @property int|null $idproyectos
 * @property int|null $id_estados_proyecto
 * @property string|null $create_at
 * @property int|null $rutUsuario
 *
 * @property ApEstadosProyecto $estadosProyecto
 * @property ApProyectos $idproyectos0
 * @property CoreUsuario $rutUsuario0
 */
class ApHistorialEstados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ap_historial_estados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idproyectos', 'id_estados_proyecto', 'rutUsuario'], 'integer'],
            [['create_at'], 'safe'],
            [['id_estados_proyecto'], 'exist', 'skipOnError' => true, 'targetClass' => ApEstadosProyecto::className(), 'targetAttribute' => ['id_estados_proyecto' => 'id_estados_proyecto']],
            [['idproyectos'], 'exist', 'skipOnError' => true, 'targetClass' => ApProyectos::className(), 'targetAttribute' => ['idproyectos' => 'idproyectos']],
            [['rutUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => CoreUsuario::className(), 'targetAttribute' => ['rutUsuario' => 'rut_usuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_historial_estados' => 'Id Historial Estados',
            'idproyectos' => 'Idproyectos',
            'id_estados_proyecto' => 'Id Estados Proyecto',
            'create_at' => 'Create At',
            'rutUsuario' => 'Rut Usuario',
        ];
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
     * Gets query for [[RutUsuario0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRutUsuario0()
    {
        return $this->hasOne(CoreUsuario::className(), ['rut_usuario' => 'rutUsuario']);
    }
}
