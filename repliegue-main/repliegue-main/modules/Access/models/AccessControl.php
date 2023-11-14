<?php

namespace app\modules\Access\models;

use Yii;

/**
 * This is the model class for table "access_control".
 *
 * @property int $id_access
 * @property string $rut_usuario
 * @property string $username
 * @property int $id_interaction
 * @property string $fecha
 *
 * @property AccessInteractions $interaction
 */
class AccessControl extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'access_control';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rut_usuario', 'username', 'id_interaction'], 'required'],
            [['id_interaction'], 'integer'],
            [['fecha'], 'safe'],
            [['rut_usuario', 'username'], 'string', 'max' => 45],
            [['id_interaction'], 'exist', 'skipOnError' => true, 'targetClass' => AccessInteractions::className(), 'targetAttribute' => ['id_interaction' => 'id_interaction']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_access' => Yii::t('app', 'Id Access'),
            'rut_usuario' => Yii::t('app', 'Rut Usuario'),
            'username' => Yii::t('app', 'Username'),
            'id_interaction' => Yii::t('app', 'Id Interaction'),
            'fecha' => Yii::t('app', 'Fecha'),
        ];
    }

    /**
     * Gets query for [[Interaction]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInteraction()
    {
        return $this->hasOne(AccessInteractions::className(), ['id_interaction' => 'id_interaction']);
    }
}
