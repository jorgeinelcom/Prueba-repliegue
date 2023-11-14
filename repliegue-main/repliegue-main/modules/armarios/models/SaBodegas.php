<?php

namespace app\modules\armarios\models;

use Yii;

/**
 * This is the model class for table "sa_bodegas".
 *
 * @property int $id_bodegas
 * @property string|null $nombre
 * @property string|null $direccion
 *
 * @property SaRegistroBodega[] $saRegistroBodegas
 */
class SaBodegas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sa_bodegas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 250],
            [['direccion'], 'string', 'max' => 450],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bodegas' => 'Id Bodegas',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
        ];
    }

    /**
     * Gets query for [[SaRegistroBodegas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaRegistroBodegas()
    {
        return $this->hasMany(SaRegistroBodega::className(), ['id_bodega' => 'id_bodegas']);
    }
}
