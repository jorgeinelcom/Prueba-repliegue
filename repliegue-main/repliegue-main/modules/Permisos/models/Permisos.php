<?php

namespace app\modules\Permisos\models;

use Yii;

/**
 * This is the model class for table "permisos".
 *
 * @property int $id_permiso
 * @property string $nombre
 * @property string $descripcion
 * @property string|null $created_at
 *
 * @property PermisosUsuarios[] $permisosUsuarios
 */
class Permisos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'permisos';
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
            'id_permiso' => 'Id Permiso',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[PermisosUsuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPermisosUsuarios()
    {
        return $this->hasMany(PermisosUsuarios::className(), ['id_permiso' => 'id_permiso']);
    }
}
