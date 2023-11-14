<?php

namespace app\modules\armarios\models;

use Yii;

/**
 * This is the model class for table "ap_repliegue".
 *
 * @property int $id_repliegue
 * @property string|null $descripcion
 *
 * @property ApProyectos[] $apProyectos
 * @property SaRegistroBodega[] $saRegistroBodegas
 */
class ApRepliegue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ap_repliegue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string', 'max' => 450],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_repliegue' => 'Id Repliegue',
            'descripcion' => 'Tipo Material',
        ];
    }

    /**
     * Gets query for [[ApProyectos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApProyectos()
    {
        return $this->hasMany(ApProyectos::className(), ['id_repliegue' => 'id_repliegue']);
    }

    /**
     * Gets query for [[SaRegistroBodegas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaRegistroBodegas()
    {
        return $this->hasMany(SaRegistroBodega::className(), ['id_repliegue' => 'id_repliegue']);
    }
}
