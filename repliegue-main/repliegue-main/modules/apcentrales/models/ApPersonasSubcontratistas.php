<?php

namespace app\modules\apcentrales\models;

use Yii;

/**
 * This is the model class for table "ap_personas_subcontratistas".
 *
 * @property int $id_personas_subcontratistas
 * @property int $idpersonas
 * @property int $id_subcontratistas
 * @property int $id_estados
 * @property string|null $create_at
 *
 * @property ApEstados $estados
 * @property ApPersonas $idpersonas0
 * @property ApSubcontratistas $subcontratistas
 */
class ApPersonasSubcontratistas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ap_personas_subcontratistas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idpersonas', 'id_subcontratistas', 'id_estados'], 'required'],
            [['idpersonas', 'id_subcontratistas', 'id_estados'], 'integer'],
            [['create_at'], 'safe'],
            [['id_estados'], 'exist', 'skipOnError' => true, 'targetClass' => ApEstados::className(), 'targetAttribute' => ['id_estados' => 'id_estados']],
            [['idpersonas'], 'exist', 'skipOnError' => true, 'targetClass' => ApPersonas::className(), 'targetAttribute' => ['idpersonas' => 'idpersonas']],
            [['id_subcontratistas'], 'exist', 'skipOnError' => true, 'targetClass' => ApSubcontratistas::className(), 'targetAttribute' => ['id_subcontratistas' => 'id_subcontratistas']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_personas_subcontratistas' => 'Id Personas Subcontratistas',
            'idpersonas' => 'Idpersonas',
            'id_subcontratistas' => 'Id Subcontratistas',
            'id_estados' => 'Id Estados',
            'create_at' => 'Create At',
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
     * Gets query for [[Idpersonas0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdpersonas0()
    {
        return $this->hasOne(ApPersonas::className(), ['idpersonas' => 'idpersonas']);
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
}
