<?php

namespace app\modules\apcentrales\models;

use Yii;

/**
 * This is the model class for table "ap_personas".
 *
 * @property int $idpersonas
 * @property int $rutPersona
 * @property string $dvPersona
 * @property string $nombre
 * @property string $apellido
 * @property string|null $fono
 * @property string $correo
 * @property int $id_estados
 * @property int|null $id_subcontratistas
 *
 * @property ApEstados $estados
 * @property ApSubcontratistas $subcontratistas
 * @property ApProyectosPersonas[] $apProyectosPersonas
 */
class ApPersonas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ap_personas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rutPersona', 'dvPersona', 'nombre', 'apellido', 'correo', 'id_estados'], 'required'],
            [['rutPersona', 'id_estados', 'id_subcontratistas'], 'integer'],
            [['dvPersona'], 'string', 'max' => 1],
            [['nombre', 'apellido'], 'string', 'max' => 100],
            [['fono'], 'string', 'max' => 45],
            [['correo'], 'string', 'max' => 200],
            [['id_estados'], 'exist', 'skipOnError' => true, 'targetClass' => ApEstados::className(), 'targetAttribute' => ['id_estados' => 'id_estados']],
            [['id_subcontratistas'], 'exist', 'skipOnError' => true, 'targetClass' => ApSubcontratistas::className(), 'targetAttribute' => ['id_subcontratistas' => 'id_subcontratistas']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpersonas' => 'Idpersonas',
            'rutPersona' => 'Rut Persona',
            'dvPersona' => 'Dv Persona',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'fono' => 'Fono',
            'correo' => 'Correo',
            'id_estados' => 'Id Estados',
            'id_subcontratistas' => 'Id Subcontratistas',
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
        return $this->hasMany(ApProyectosPersonas::className(), ['idpersonas' => 'idpersonas']);
    }
}
