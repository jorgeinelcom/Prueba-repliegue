<?php

namespace app\modules\apcentrales\models;

use Yii;

/**
 * This is the model class for table "ap_estados".
 *
 * @property int $id_estados
 * @property string $nombre
 * @property string|null $descripcion
 *
 * @property ApChecklists[] $apChecklists
 * @property ApPersonas[] $apPersonas
 * @property ApPersonasSubcontratistas[] $apPersonasSubcontratistas
 * @property ApProyectosPersonas[] $apProyectosPersonas
 * @property ApProyectosVehiculos[] $apProyectosVehiculos
 * @property ApVehiculosSubcontratistas[] $apVehiculosSubcontratistas
 */
class ApEstados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ap_estados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_estados' => 'Id Estados',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[ApChecklists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApChecklists()
    {
        return $this->hasMany(ApChecklists::className(), ['id_estados' => 'id_estados']);
    }

    /**
     * Gets query for [[ApPersonas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApPersonas()
    {
        return $this->hasMany(ApPersonas::className(), ['id_estados' => 'id_estados']);
    }

    /**
     * Gets query for [[ApPersonasSubcontratistas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApPersonasSubcontratistas()
    {
        return $this->hasMany(ApPersonasSubcontratistas::className(), ['id_estados' => 'id_estados']);
    }

    /**
     * Gets query for [[ApProyectosPersonas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApProyectosPersonas()
    {
        return $this->hasMany(ApProyectosPersonas::className(), ['id_estados' => 'id_estados']);
    }

    /**
     * Gets query for [[ApProyectosVehiculos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApProyectosVehiculos()
    {
        return $this->hasMany(ApProyectosVehiculos::className(), ['id_estados' => 'id_estados']);
    }

    /**
     * Gets query for [[ApVehiculosSubcontratistas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApVehiculosSubcontratistas()
    {
        return $this->hasMany(ApVehiculosSubcontratistas::className(), ['ap_estados_id_estados' => 'id_estados']);
    }
}
