<?php

namespace app\modules\armarios\models;

use Yii;

/**
 * This is the model class for table "sa_oc".
 *
 * @property int $id_oc
 * @property int $id_agencia
 * @property int $id_comuna
 * @property string|null $descripcion
 * @property string|null $nombre
 * @property string|null $omonimo
 * @property string|null $create_at
 *
 * @property SaAgencia $agencia
 * @property SaComuna $comuna
 */
class SaOc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sa_oc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_agencia', 'id_comuna'], 'required'],
            [['id_agencia', 'id_comuna'], 'integer'],
            [['create_at'], 'safe'],
            [['descripcion'], 'string', 'max' => 450],
            [['nombre'], 'string', 'max' => 150],
            [['omonimo'], 'string', 'max' => 45],
            [['id_agencia'], 'exist', 'skipOnError' => true, 'targetClass' => SaAgencia::className(), 'targetAttribute' => ['id_agencia' => 'id_agencia']],
            [['id_comuna'], 'exist', 'skipOnError' => true, 'targetClass' => SaComuna::className(), 'targetAttribute' => ['id_comuna' => 'id_comuna']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_oc' => 'Id Oc',
            'id_agencia' => 'Id Agencia',
            'id_comuna' => 'Id Comuna',
            'descripcion' => 'Descripcion',
            'nombre' => 'Oficina Central',
            'omonimo' => 'Omonimo',
            'create_at' => 'Create At',
        ];
    }

    /**
     * Gets query for [[Agencia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgencia()
    {
        return $this->hasOne(SaAgencia::className(), ['id_agencia' => 'id_agencia']);
    }

    /**
     * Gets query for [[Comuna]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComuna()
    {
        return $this->hasOne(SaComuna::className(), ['id_comuna' => 'id_comuna']);
    }
}
