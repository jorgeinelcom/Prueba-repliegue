<?php

namespace app\modules\armarios\models;

use Yii;

/**
 * This is the model class for table "sa_region".
 *
 * @property int $id_region
 * @property string|null $descripcion
 * @property string|null $created_at
 *
 * @property SaComuna[] $saComunas
 */
class SaRegion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sa_region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['descripcion'], 'string', 'max' => 145],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_region' => 'Id Region',
            'descripcion' => 'Descripcion',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[SaComunas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaComunas()
    {
        return $this->hasMany(SaComuna::className(), ['id_region' => 'id_region']);
    }
}
