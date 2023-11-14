<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permisos_usuarios".
 *
 * @property int $id_permisos_usuarios
 * @property int $id_permiso
 * @property int $rut_usuario
 * @property string|null $created_at
 */
class PermisosUsuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'permisos_usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_permiso', 'rut_usuario'], 'required'],
            [['id_permiso', 'rut_usuario'], 'integer'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_permisos_usuarios' => 'Id Permisos Usuarios',
            'id_permiso' => 'Id Permiso',
            'rut_usuario' => 'Rut Usuario',
            'created_at' => 'Created At',
        ];
    }
}
