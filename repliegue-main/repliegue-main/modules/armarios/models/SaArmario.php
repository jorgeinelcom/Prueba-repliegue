<?php

namespace app\modules\armarios\models;

use Yii;

/**
 * This is the model class for table "sa_armario".
 *
 * @property int $id_armario
 * @property string|null $descripcion
 * @property string|null $create_at
 *
 * @property SaRegistroBodega[] $saRegistroBodegas
 */
class SaArmario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sa_armario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_at'], 'safe'],
            [['descripcion'], 'string', 'max' => 450],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_armario' => 'Id Armario',
            'descripcion' => 'N° Armario / N° Matriz',
            'create_at' => 'Create At',
        ];
    }

    /**
     * Gets query for [[SaRegistroBodegas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaRegistroBodegas()
    {
        return $this->hasMany(SaRegistroBodega::className(), ['id_armario' => 'id_armario']);
    }
}
