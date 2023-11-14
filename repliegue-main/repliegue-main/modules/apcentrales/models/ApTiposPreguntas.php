<?php

namespace app\modules\apcentrales\models;

use Yii;

/**
 * This is the model class for table "ap_tipos_preguntas".
 *
 * @property int $id_tipos_preguntas
 * @property string|null $nombre
 * @property string|null $descripcion
 *
 * @property ApChecklistsPreguntas[] $apChecklistsPreguntas
 */
class ApTiposPreguntas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ap_tipos_preguntas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 150],
            [['descripcion'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tipos_preguntas' => 'Id Tipos Preguntas',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[ApChecklistsPreguntas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApChecklistsPreguntas()
    {
        return $this->hasMany(ApChecklistsPreguntas::className(), ['id_tipos_preguntas' => 'id_tipos_preguntas']);
    }
}
