<?php

namespace app\modules\PassRecovery\models;

use Yii;

/**
 * This is the model class for table "cargo".
 *
 * @property int $id_cargo
 * @property string $nombre
 * @property string $descripcion
 * @property string|null $created_at
 *
 * @property CoreUsuario[] $coreUsuarios
 */
class Cargo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo';
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
            'id_cargo' => 'Id Cargo',
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
        return $this->hasMany(CoreUsuario::className(), ['id_cargo' => 'id_cargo']);
    }
}
