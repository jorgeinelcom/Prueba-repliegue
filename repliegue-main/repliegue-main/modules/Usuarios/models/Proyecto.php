<?php

namespace app\modules\Usuarios\models;

use Yii;

/**
 * This is the model class for table "proyecto".
 *
 * @property int $id_proyecto
 * @property string $nombre
 * @property string $descripcion
 * @property string|null $created_at
 *
 * @property CoreUsuario[] $coreUsuarios
 */
class Proyecto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proyecto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion'], 'required'],
            [['created_at'], 'safe'],
            [['nombre'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 145],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_proyecto' => 'Id Proyecto',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'created_at' => 'Fecha de creación',
        ];
    }

    /**
     * Gets query for [[CoreUsuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCoreUsuarios()
    {
        return $this->hasMany(CoreUsuario::className(), ['id_proyecto' => 'id_proyecto']);
    }
}
