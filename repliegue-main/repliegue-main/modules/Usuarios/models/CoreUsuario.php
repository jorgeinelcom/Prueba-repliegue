<?php

namespace app\modules\Usuarios\models;

use Yii;


class CoreUsuario extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'core_usuario';
    }



    public $password_repeat;
    public function rules()
    {
        return [
            [['rut_usuario', 'dv', 'nombre', 'apellidos', 'correo', 'username', 'id_cargo', 'id_proyecto', 'id_estado'], 'required'],
            [['rut_usuario', 'id_cargo', 'id_proyecto', 'id_estado'], 'integer'],
            [['created_at'], 'safe'],
            [['correo'], 'email'],
            [['dv'], 'string', 'max' => 1],
            [['nombre', 'apellidos', 'correo', 'username', 'cambio_pass', 'hash_cambio'], 'string', 'max' => 45],
            [['password'], 'string', 'max' => 256],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Las Contraseñas no coinciden" ],
            [['rut_usuario'], 'unique'],
            [['username'], 'unique'],
            [['id_cargo'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['id_cargo' => 'id_cargo']],
            [['id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoUsuarios::className(), 'targetAttribute' => ['id_estado' => 'id_estado']],
            [['id_proyecto'], 'exist', 'skipOnError' => true, 'targetClass' => Proyecto::className(), 'targetAttribute' => ['id_proyecto' => 'id_proyecto']],
            [['password'], 'required',  'except' => 'update']
        ];
    }


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
            'created_at' => 'Fecha de Creación',
        ];
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
}
