<?php

namespace app\modules\apcentrales\models;

use Yii;

/**
 * This is the model class for table "ap_categorias_personas".
 *
 * @property int $id_categorias_personas
 * @property string $descripcion
 * @property string|null $create_at
 *
 * @property ApPersonas[] $apPersonas
 */
class ApCategoriasPersonas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ap_categorias_personas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['create_at'], 'safe'],
            [['descripcion'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_categorias_personas' => 'Id Categorias Personas',
            'descripcion' => 'Descripcion',
            'create_at' => 'Create At',
        ];
    }

    /**
     * Gets query for [[ApPersonas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApPersonas()
    {
        return $this->hasMany(ApPersonas::className(), ['id_categorias_personas' => 'id_categorias_personas']);
    }
}
