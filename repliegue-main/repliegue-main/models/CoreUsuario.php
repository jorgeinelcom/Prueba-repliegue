<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "core_usuario".
 *
 * @property int $rut_usuario
 * @property string $dv
 * @property string $nombre
 * @property string $apellidos
 * @property string $correo
 * @property string $username
 * @property string $password
 * @property string $cambio_pass
 * @property string $hash_cambio
 * @property string $id_cargo
 * @property string $id_proyecto
 * @property string $id_estado
 * @property string|null $created_at
 */
class CoreUsuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'core_usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rut_usuario', 'dv', 'nombre', 'apellidos', 'correo', 'username', 'password', 'cambio_pass', 'hash_cambio', 'id_cargo', 'id_proyecto', 'id_estado'], 'required'],
            [['rut_usuario'], 'integer'],
            [['created_at'], 'safe'],
            [['dv'], 'string', 'max' => 1],
            [['nombre', 'apellidos', 'correo', 'username', 'password', 'cambio_pass', 'hash_cambio', 'id_cargo', 'id_proyecto', 'id_estado'], 'string', 'max' => 45],
            [['rut_usuario'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rut_usuario' => 'Rut Usuario',
            'dv' => 'Dv',
            'nombre' => 'Nombre',
            'apellidos' => 'Apellidos',
            'correo' => 'Correo',
            'username' => 'Username',
            'password' => 'Password',
            'cambio_pass' => 'Cambio Pass',
            'hash_cambio' => 'Hash Cambio',
            'id_cargo' => 'Id Cargo',
            'id_proyecto' => 'Id Proyecto',
            'id_estado' => 'Id Estado',
            'created_at' => 'Created At',
        ];
    }
}
