<?php

namespace app\modules\Access\models;

use Yii;

/**
 * This is the model class for table "access_interactions".
 *
 * @property int $id_interaction
 * @property string $name
 * @property string $description
 * @property string|null $date
 *
 * @property AccessControl[] $accessControls
 */
class AccessInteractions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'access_interactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['date'], 'safe'],
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
            'id_interaction' => Yii::t('app', 'Id Interaction'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'date' => Yii::t('app', 'Date'),
        ];
    }

    /**
     * Gets query for [[AccessControls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccessControls()
    {
        return $this->hasMany(AccessControl::className(), ['id_interaccion' => 'id_interaction']);
    }
}
