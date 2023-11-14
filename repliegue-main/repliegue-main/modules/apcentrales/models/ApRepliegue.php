<?php

namespace app\modules\apcentrales\models;

use Yii;

/**
 * This is the model class for table "ap_repliegue".
 *
 * @property int $id_repliegue
 * @property string|null $descripcion
 *
 * @property ApProyectos[] $apProyectos
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
            [['id_repliegue'], 'required'],
            [['id_repliegue'], 'integer'],
            [['descripcion'], 'string', 'max' => 450],
            [['id_repliegue'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_repliegue' => 'Id Repliegue',
            'descripcion' => 'Repliegue',
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
}
