<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "access_control".
 *
 * @property int $id_access
 * @property string $rut_usuario
 * @property string $username
 * @property int $id_interaction
 * @property string $created_at
 */
class AccessControl extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'access_control';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rut_usuario', 'username', 'id_interaction'], 'required'],
            [['id_interaction'], 'integer'],
            [['created_at'], 'safe'],
            [['rut_usuario', 'username'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_access' => 'Id Access',
            'rut_usuario' => 'Rut Usuario',
            'username' => 'Username',
            'id_interaction' => 'Id Interaction',
            'created_at' => 'Created At',
        ];
    }
}
