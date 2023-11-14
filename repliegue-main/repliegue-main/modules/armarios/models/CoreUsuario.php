<?php

namespace app\modules\armarios\models;

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
 * @property int $id_cargo
 * @property int $id_proyecto
 * @property int $id_estado
 * @property string|null $created_at
 *
 * @property ApChecklistsProyectos[] $apChecklistsProyectos
 * @property ApHistorialEstados[] $apHistorialEstados
 * @property ApProyectos[] $apProyectos
 * @property ApProyectos[] $apProyectos0
 * @property Cargo $cargo
 * @property EstadoUsuarios $estado
 * @property Proyecto $proyecto
 * @property PermisosUsuarios[] $permisosUsuarios
 * @property SaPallet[] $saPallets
 * @property SaRegistroBodega[] $saRegistroBodegas
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
            [['rut_usuario', 'id_cargo', 'id_proyecto', 'id_estado'], 'integer'],
            [['created_at'], 'safe'],
            [['dv'], 'string', 'max' => 1],
            [['nombre', 'apellidos', 'correo', 'username', 'cambio_pass', 'hash_cambio'], 'string', 'max' => 45],
            [['password'], 'string', 'max' => 256],
            [['rut_usuario'], 'unique'],
            [['id_cargo'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['id_cargo' => 'id_cargo']],
            [['id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoUsuarios::className(), 'targetAttribute' => ['id_estado' => 'id_estado']],
            [['id_proyecto'], 'exist', 'skipOnError' => true, 'targetClass' => Proyecto::className(), 'targetAttribute' => ['id_proyecto' => 'id_proyecto']],
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

    /**
     * Gets query for [[ApChecklistsProyectos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApChecklistsProyectos()
    {
        return $this->hasMany(ApChecklistsProyectos::className(), ['rut_usuario' => 'rut_usuario']);
    }

    /**
     * Gets query for [[ApHistorialEstados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApHistorialEstados()
    {
        return $this->hasMany(ApHistorialEstados::className(), ['rutUsuario' => 'rut_usuario']);
    }

    /**
     * Gets query for [[ApProyectos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApProyectos()
    {
        return $this->hasMany(ApProyectos::className(), ['inspector_asignado' => 'rut_usuario']);
    }

    /**
     * Gets query for [[ApProyectos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApProyectos0()
    {
        return $this->hasMany(ApProyectos::className(), ['rut_usuario' => 'rut_usuario']);
    }

    /**
     * Gets query for [[Cargo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCargo()
    {
        return $this->hasOne(Cargo::className(), ['id_cargo' => 'id_cargo']);
    }

    /**
     * Gets query for [[Estado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(EstadoUsuarios::className(), ['id_estado' => 'id_estado']);
    }

    /**
     * Gets query for [[Proyecto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProyecto()
    {
        return $this->hasOne(Proyecto::className(), ['id_proyecto' => 'id_proyecto']);
    }

    /**
     * Gets query for [[PermisosUsuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPermisosUsuarios()
    {
        return $this->hasMany(PermisosUsuarios::className(), ['rut_usuario' => 'rut_usuario']);
    }

    /**
     * Gets query for [[SaPallets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaPallets()
    {
        return $this->hasMany(SaPallet::className(), ['rut_usuario' => 'rut_usuario']);
    }

    /**
     * Gets query for [[SaRegistroBodegas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaRegistroBodegas()
    {
        return $this->hasMany(SaRegistroBodega::className(), ['rut_usuario' => 'rut_usuario']);
    }
}
