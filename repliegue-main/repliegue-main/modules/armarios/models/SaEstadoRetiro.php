<?php

namespace app\modules\armarios\models;

use Yii;

/**
 * This is the model class for table "sa_estado_retiro".
 *
 * @property int $id_estado_retiro
 * @property string|null $descripcion
 */
class SaEstadoRetiro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sa_estado_retiro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string', 'max' => 145],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_estado_retiro' => 'Id Estado Retiro',
            'descripcion' => 'Estado',
        ];
    }
}
