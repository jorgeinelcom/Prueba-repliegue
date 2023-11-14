<?php

namespace app\modules\armarios\models;

use Yii;

/**
 * This is the model class for table "sa_comuna".
 *
 * @property int $id_comuna
 * @property string|null $nombre
 * @property string|null $create_at
 *
 * @property SaOc[] $saOcs
 */
class SaComuna extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sa_comuna';
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
            'id_comuna' => 'Id Comuna',
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
        return $this->hasMany(SaOc::className(), ['id_comuna' => 'id_comuna']);
    }
}
