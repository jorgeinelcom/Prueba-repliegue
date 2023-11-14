<?php

namespace app\modules\apcentrales\models;

use Yii;

/**
 * This is the model class for table "ap_checklists_respuestas".
 *
 * @property int $id_checklists_respuestas
 * @property string|null $create_at
 * @property string $respuesta
 * @property int $id_checklists_preguntas
 * @property int $id_checklists_proyectos
 * @property int $rut_usuario
 *
 * @property ApChecklistsPreguntas $checklistsPreguntas
 * @property ApChecklistsProyectos $checklistsProyectos
 */
class ApChecklistsRespuestas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ap_checklists_respuestas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_at'], 'safe'],
            [['respuesta', 'id_checklists_preguntas', 'id_checklists_proyectos', 'rut_usuario'], 'required'],
            [['id_checklists_preguntas', 'id_checklists_proyectos', 'rut_usuario'], 'integer'],
            [['respuesta'], 'string', 'max' => 450],
            [['id_checklists_preguntas'], 'exist', 'skipOnError' => true, 'targetClass' => ApChecklistsPreguntas::className(), 'targetAttribute' => ['id_checklists_preguntas' => 'id_checklists_preguntas']],
            [['id_checklists_proyectos'], 'exist', 'skipOnError' => true, 'targetClass' => ApChecklistsProyectos::className(), 'targetAttribute' => ['id_checklists_proyectos' => 'id_checklists_proyectos']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_checklists_respuestas' => 'Id Checklists Respuestas',
            'create_at' => 'Create At',
            'respuesta' => 'Respuesta',
            'id_checklists_preguntas' => 'Id Checklists Preguntas',
            'id_checklists_proyectos' => 'Id Checklists Proyectos',
            'rut_usuario' => 'Rut Usuario',
        ];
    }

    /**
     * Gets query for [[ChecklistsPreguntas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChecklistsPreguntas()
    {
        return $this->hasOne(ApChecklistsPreguntas::className(), ['id_checklists_preguntas' => 'id_checklists_preguntas']);
    }

    /**
     * Gets query for [[ChecklistsProyectos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChecklistsProyectos()
    {
        return $this->hasOne(ApChecklistsProyectos::className(), ['id_checklists_proyectos' => 'id_checklists_proyectos']);
    }
}
