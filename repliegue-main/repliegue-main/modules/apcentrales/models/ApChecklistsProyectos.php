<?php

namespace app\modules\apcentrales\models;

use Yii;

/**
 * This is the model class for table "ap_checklists_proyectos".
 *
 * @property int $id_checklists_proyectos
 * @property string|null $create_at
 * @property int $id_checklists
 * @property int $idproyectos
 * @property int $rut_usuario
 *
 * @property ApArchivosChecklist[] $apArchivosChecklists
 * @property ApChecklists $checklists
 * @property ApProyectos $idproyectos0
 * @property CoreUsuario $rutUsuario
 * @property ApChecklistsRespuestas[] $apChecklistsRespuestas
 */
class ApChecklistsProyectos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ap_checklists_proyectos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_at'], 'safe'],
            [['id_checklists', 'idproyectos', 'rut_usuario'], 'required'],
            [['id_checklists', 'idproyectos', 'rut_usuario'], 'integer'],
            [['id_checklists'], 'exist', 'skipOnError' => true, 'targetClass' => ApChecklists::className(), 'targetAttribute' => ['id_checklists' => 'id_checklists']],
            [['idproyectos'], 'exist', 'skipOnError' => true, 'targetClass' => ApProyectos::className(), 'targetAttribute' => ['idproyectos' => 'idproyectos']],
            [['rut_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => CoreUsuario::className(), 'targetAttribute' => ['rut_usuario' => 'rut_usuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_checklists_proyectos' => 'Id Checklists Proyectos',
            'create_at' => 'Create At',
            'id_checklists' => 'Id Checklists',
            'idproyectos' => 'Idproyectos',
            'rut_usuario' => 'Rut Usuario',
        ];
    }

    /**
     * Gets query for [[ApArchivosChecklists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApArchivosChecklists()
    {
        return $this->hasMany(ApArchivosChecklist::className(), ['id_checklists_proyectos' => 'id_checklists_proyectos']);
    }

    /**
     * Gets query for [[Checklists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChecklists()
    {
        return $this->hasOne(ApChecklists::className(), ['id_checklists' => 'id_checklists']);
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
     * Gets query for [[RutUsuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRutUsuario()
    {
        return $this->hasOne(CoreUsuario::className(), ['rut_usuario' => 'rut_usuario']);
    }

    /**
     * Gets query for [[ApChecklistsRespuestas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApChecklistsRespuestas()
    {
        return $this->hasMany(ApChecklistsRespuestas::className(), ['id_checklists_proyectos' => 'id_checklists_proyectos']);
    }
}
