<?php

namespace app\modules\apcentrales\models;

use Yii;

/**
 * This is the model class for table "ap_checklists_preguntas".
 *
 * @property int $id_checklists_preguntas
 * @property string|null $create_at
 * @property string $descripcion
 * @property int $orden
 * @property int $id_checklists
 * @property int $id_tipos_preguntas
 *
 * @property ApChecklists $checklists
 * @property ApTiposPreguntas $tiposPreguntas
 * @property ApChecklistsRespuestas[] $apChecklistsRespuestas
 */
class ApChecklistsPreguntas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ap_checklists_preguntas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_at'], 'safe'],
            [['descripcion', 'orden', 'id_checklists', 'id_tipos_preguntas'], 'required'],
            [['orden', 'id_checklists', 'id_tipos_preguntas'], 'integer'],
            [['descripcion'], 'string', 'max' => 500],
            [['id_checklists'], 'exist', 'skipOnError' => true, 'targetClass' => ApChecklists::className(), 'targetAttribute' => ['id_checklists' => 'id_checklists']],
            [['id_tipos_preguntas'], 'exist', 'skipOnError' => true, 'targetClass' => ApTiposPreguntas::className(), 'targetAttribute' => ['id_tipos_preguntas' => 'id_tipos_preguntas']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_checklists_preguntas' => 'Id Checklists Preguntas',
            'create_at' => 'Create At',
            'descripcion' => 'Descripcion',
            'orden' => 'Orden',
            'id_checklists' => 'Id Checklists',
            'id_tipos_preguntas' => 'Id Tipos Preguntas',
        ];
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
     * Gets query for [[TiposPreguntas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTiposPreguntas()
    {
        return $this->hasOne(ApTiposPreguntas::className(), ['id_tipos_preguntas' => 'id_tipos_preguntas']);
    }

    /**
     * Gets query for [[ApChecklistsRespuestas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApChecklistsRespuestas()
    {
        return $this->hasMany(ApChecklistsRespuestas::className(), ['id_checklists_preguntas' => 'id_checklists_preguntas']);
    }
}
