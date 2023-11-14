<?php

namespace app\modules\armarios\models;

use Yii;

/**
 * This is the model class for table "sa_tipo_cable".
 *
 * @property int $id_tipo_cable
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property string|null $create_at
 *
 * @property SaTipoCableRegistro[] $saTipoCableRegistros
 */
class SaTipoCable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sa_tipo_cable';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_at'], 'safe'],
            [['nombre'], 'string', 'max' => 60],
            [['descripcion'], 'string', 'max' => 145],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_cable' => 'Id Tipo Cable',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'create_at' => 'Create At',
        ];
    }

    /**
     * Gets query for [[SaTipoCableRegistros]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaTipoCableRegistros()
    {
        return $this->hasMany(SaTipoCableRegistro::className(), ['id_tipo_cable' => 'id_tipo_cable']);
    }
}
