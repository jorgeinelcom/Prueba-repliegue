<?php

namespace app\modules\apcentrales\models;

use Yii;

/**
 * This is the model class for table "ap_proyectos_personas".
 *
 * @property int $id_proyectos_personas
 * @property string|null $create_at
 * @property int $idproyectos
 * @property int $idpersonas
 * @property int $id_estados
 *
 * @property ApEstados $estados
 * @property ApPersonas $idpersonas0
 * @property ApProyectos $idproyectos0
 */
class ApProyectosPersonas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ap_proyectos_personas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idproyectos', 'idpersonas', 'id_estados'], 'required'],
            [['idproyectos', 'idpersonas', 'id_estados'], 'integer'],
            [['create_at'], 'string', 'max' => 45],
            [['id_estados'], 'exist', 'skipOnError' => true, 'targetClass' => ApEstados::className(), 'targetAttribute' => ['id_estados' => 'id_estados']],
            [['idpersonas'], 'exist', 'skipOnError' => true, 'targetClass' => ApPersonas::className(), 'targetAttribute' => ['idpersonas' => 'idpersonas']],
            [['idproyectos'], 'exist', 'skipOnError' => true, 'targetClass' => ApProyectos::className(), 'targetAttribute' => ['idproyectos' => 'idproyectos']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_proyectos_personas' => 'Id Proyectos Personas',
            'create_at' => 'Create At',
            'idproyectos' => 'Idproyectos',
            'idpersonas' => 'Idpersonas',
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
     * Gets query for [[Idpersonas0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdpersonas0()
    {
        return $this->hasOne(ApPersonas::className(), ['idpersonas' => 'idpersonas']);
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
}
