<?php

namespace app\modules\apcentrales\models;

use Yii;

/**
 * This is the model class for table "ap_archivos_checklist".
 *
 * @property int $id_archivos_checklist
 * @property string|null $create_at
 * @property string $url
 * @property int $id_checklists_proyectos
 *
 * @property ApChecklistsProyectos $checklistsProyectos
 */
class ApArchivosChecklist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ap_archivos_checklist';
    }

    /**
     * {@inheritdoc}
     */
    public $imageFiles;
    public function rules()
    {
        return [
            [['create_at'], 'safe'],
            [['url', 'id_checklists_proyectos'], 'required'],
            [['id_checklists_proyectos'], 'integer'],
            [['url'], 'string', 'max' => 250],
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'maxFiles' => 10],
            [['id_checklists_proyectos'], 'exist', 'skipOnError' => true, 'targetClass' => ApChecklistsProyectos::className(), 'targetAttribute' => ['id_checklists_proyectos' => 'id_checklists_proyectos']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_archivos_checklist' => 'Id Archivos Checklist',
            'create_at' => 'Create At',
            'url' => 'Url',
            'id_checklists_proyectos' => 'Id Checklists Proyectos',
        ];
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
