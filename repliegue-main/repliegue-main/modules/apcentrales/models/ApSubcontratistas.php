<?php

namespace app\modules\apcentrales\models;

use Yii;

/**
 * This is the model class for table "ap_subcontratistas".
 *
 * @property int $id_subcontratistas
 * @property string $nombre
 * @property string|null $create_at
 * @property int|null $precio_aereo
 * @property int|null $precio_matriz
 *
 * @property ApPersonasSubcontratistas[] $apPersonasSubcontratistas
 * @property ApProyectos[] $apProyectos
 * @property ApVehiculosSubcontratistas[] $apVehiculosSubcontratistas
 */
class ApSubcontratistas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ap_subcontratistas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['create_at'], 'safe'],
            [['precio_aereo', 'precio_matriz'], 'integer'],
            [['nombre'], 'string', 'max' => 450],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_subcontratistas' => 'Id Subcontratistas',
            'nombre' => 'Subcontratista',
            'create_at' => 'Create At',
            'precio_aereo' => 'Precio Aereo',
            'precio_matriz' => 'Precio Matriz',
        ];
    }

    /**
     * Gets query for [[ApPersonasSubcontratistas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApPersonasSubcontratistas()
    {
        return $this->hasMany(ApPersonasSubcontratistas::className(), ['id_subcontratistas' => 'id_subcontratistas']);
    }

    /**
     * Gets query for [[ApProyectos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApProyectos()
    {
        return $this->hasMany(ApProyectos::className(), ['id_subcontratistas' => 'id_subcontratistas']);
    }

    /**
     * Gets query for [[ApVehiculosSubcontratistas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApVehiculosSubcontratistas()
    {
        return $this->hasMany(ApVehiculosSubcontratistas::className(), ['id_subcontratistas' => 'id_subcontratistas']);
    }
}
