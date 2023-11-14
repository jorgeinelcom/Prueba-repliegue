<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\Usuarios\models\CoreUsuario */

$this->title = $model->nombre. ' '. $model->apellidos;
\yii\web\YiiAsset::register($this);
?>
<div class="card ">

    <div class="col-md-9">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-md-3">
        <p>
            <?= Html::a('<i class="fas fa-arrow-left"></i> Volver', ['index'], ['class' => 'btn btn-default  btn-top']) ?>
            <?= Html::a('Update', ['update', 'id' => $model->rut_usuario], ['class' => 'btn btn-primary fr btn-top']) ?>
        </p>
    </div>




    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'rut_usuario',
            'dv',
            'nombre',
            'apellidos',
            'correo',
            'username',
            'password',

            [
                'attribute' => 'id_cargo',
                'label' => 'Cargo',
                'value' => function($model){
                    return $model->cargo->nombre;
                }
            ],
            [
                'attribute' => 'id_proyecto',
                'label' => 'Proyecto',
                'value' => function($model){
                    return $model->proyecto->nombre;
                }
            ],
            [
                'attribute' => 'id_estado',
                'label' => 'Estado Usuario',
                'value' => function($model){
                    return $model->estado->nombre;
                }
            ],
          
            'created_at',
        ],
    ]) ?>

</div>
