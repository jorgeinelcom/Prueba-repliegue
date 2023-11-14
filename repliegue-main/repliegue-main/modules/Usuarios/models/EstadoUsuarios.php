<?php

namespace app\modules\Usuarios\models;

use Yii;

/**
 * This is the model class for table "estado_usuarios".
 *
 * @property int $id_estado
 * @property string $nombre
 * @property string $descripcion
 * @property string|null $created_at
 *
 * @property CoreUsuario[] $coreUsuarios
 */
class EstadoUsuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estado_usuarios';
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
            'id_estado' => 'Id Estado',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[CoreUsuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCoreUsuarios()
    {
        return $this->hasMany(CoreUsuario::className(), ['id_estado' => 'id_estado']);
    }
}
