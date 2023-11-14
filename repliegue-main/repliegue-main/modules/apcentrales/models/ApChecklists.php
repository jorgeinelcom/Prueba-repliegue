<?php

namespace app\modules\apcentrales\models;

use Yii;

/**
 * This is the model class for table "ap_checklists".
 *
 * @property int $id_checklists
 * @property string $descripcion
 * @property string|null $create_at
 * @property int $id_estados
 *
 * @property ApEstados $estados
 * @property ApChecklistsPreguntas[] $apChecklistsPreguntas
 * @property ApChecklistsProyectos[] $apChecklistsProyectos
 */
class ApChecklists extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ap_checklists';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion', 'id_estados'], 'required'],
            [['create_at'], 'safe'],
            [['id_estados'], 'integer'],
            [['descripcion'], 'string', 'max' => 200],
            [['id_estados'], 'exist', 'skipOnError' => true, 'targetClass' => ApEstados::className(), 'targetAttribute' => ['id_estados' => 'id_estados']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_checklists' => 'Id Checklists',
            'descripcion' => 'Descripcion',
            'create_at' => 'Create At',
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
     * Gets query for [[ApChecklistsPreguntas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApChecklistsPreguntas()
    {
        return $this->hasMany(ApChecklistsPreguntas::className(), ['id_checklists' => 'id_checklists']);
    }

    /**
     * Gets query for [[ApChecklistsProyectos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApChecklistsProyectos()
    {
        return $this->hasMany(ApChecklistsProyectos::className(), ['id_checklists' => 'id_checklists']);
    }
}
