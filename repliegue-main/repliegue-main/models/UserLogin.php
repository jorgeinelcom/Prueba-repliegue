<?php

namespace app\models;

use Yii;


class UserLogin extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    
    public static function tableName()
    {
        return 'core_usuario';
    }

    public $authKey;
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



    public function getAuthKey(){
        return $this->authKey;
    }

    public function getId(){
        return $this->rut_usuario;
    }

    public function validateAuthKey($authKey){
        return $this->authKey === $authKey;
    }

    public static function findIdentity($id){
        return self::findOne(['rut_usuario' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null){
        throw new \yii\base\NotSupportedException();
    }

    public static function findByUsername($username){
        return self::findOne(['username' => $username]);
    }
  
    public function validatePassword($password){
        return password_verify($password, $this->password);
    }


    public function isActive(){
        if($this->id_estado == 1){
            return true;
        }else{
            return false;
        }
    }


}
