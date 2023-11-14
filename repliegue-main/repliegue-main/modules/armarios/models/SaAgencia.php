<?php

namespace app\modules\armarios\models;

use Yii;

/**
 * This is the model class for table "sa_agencia".
 *
 * @property int $id_agencia
 * @property string|null $nombre
 * @property string|null $create_at
 *
 * @property SaOc[] $saOcs
 */
class SaAgencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sa_agencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_at'], 'safe'],
            [['nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_agencia' => 'Id Agencia',
            'nombre' => 'Nombre',
            'create_at' => 'Create At',
        ];
    }

    /**
     * Gets query for [[SaOcs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaOcs()
    {
        return $this->hasMany(SaOc::className(), ['id_agencia' => 'id_agencia']);
    }
}
