<?php

namespace app\modules\Permisos\models;

use Yii;

/**
 * This is the model class for table "permisos_usuarios".
 *
 * @property int $id_permisos_usuarios
 * @property int $id_permiso
 * @property int $rut_usuario
 * @property string|null $created_at
 *
 * @property Permisos $permiso
 * @property CoreUsuario $rutUsuario
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
            [['id_permiso'], 'exist', 'skipOnError' => true, 'targetClass' => Permisos::className(), 'targetAttribute' => ['id_permiso' => 'id_permiso']],
            [['rut_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => CoreUsuario::className(), 'targetAttribute' => ['rut_usuario' => 'rut_usuario']],
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
            'created_at' => 'Fecha de creación',
        ];
    }

    /**
     * Gets query for [[Permiso]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPermiso()
    {
        return $this->hasOne(Permisos::className(), ['id_permiso' => 'id_permiso']);
    }

    /**
     * Gets query for [[RutUsuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRutUsuario()
    {
        return $this->hasOne(CoreUsuario::className(), ['rut_usuario' => 'rut_usuario']);
    }
}
