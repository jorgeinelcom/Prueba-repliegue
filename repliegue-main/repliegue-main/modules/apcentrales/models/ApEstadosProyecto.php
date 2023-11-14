<?php

namespace app\modules\apcentrales\models;

use Yii;

/**
 * This is the model class for table "ap_estados_proyecto".
 *
 * @property int $id_estados_proyecto
 * @property string $nombre
 * @property string|null $descripcion
 *
 * @property ApProyectos[] $apProyectos
 */
class ApEstadosProyecto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ap_estados_proyecto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 245],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_estados_proyecto' => 'Id Estados Proyecto',
            'nombre' => 'Estado',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[ApProyectos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApProyectos()
    {
        return $this->hasMany(ApProyectos::className(), ['id_estados_proyecto' => 'id_estados_proyecto']);
    }
}
