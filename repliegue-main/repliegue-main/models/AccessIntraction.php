<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "access_intraction".
 *
 * @property int $id_interaction
 * @property string $name
 * @property string $description
 * @property string|null $created_at
 */
class AccessIntraction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'access_intraction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 45],
            [['description'], 'string', 'max' => 145],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_interaction' => 'Id Interaction',
            'name' => 'Name',
            'description' => 'Description',
            'created_at' => 'Created At',
        ];
    }
}
