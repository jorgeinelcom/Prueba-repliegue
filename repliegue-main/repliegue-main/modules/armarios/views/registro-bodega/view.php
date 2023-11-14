<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\armarios\models\SaRegistroBodega */

$this->title = $model->pallet->nombre.' - '.$model->armario->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Sa Registro Bodegas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sa-registro-bodega-view">

  <h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <hr>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id_registro_bodega], ['class' => 'btn btn-info']) ?>
      
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        
            'bodega.nombre',
            'id',
            'repliegue.descripcion',
            'pallet.nombre',
            'armario.descripcion',
             [
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Buscar...'
                ],
                'attribute' => 'fecha_repliegue',
                'format' => 'raw',
                'label' => 'Fecha Repliegue',
                'value' => function ($model) {
                    return date('d-m-Y', strtotime($model->fecha_repliegue));
                }
            ],
            'kilos_cu',
            'trozos',
            'peso_pallet',
            'rutUsuario.nombre',
             [
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Buscar...'
                ],
                'attribute' => 'create_at',
                'format' => 'raw',
                'label' => 'Fecha Creación',
                'value' => function ($model) {
                    return date('d-m-Y H:i:s', strtotime($model->create_at));
                }
            ],
        ],
    ]) ?>

    <a href="index.php?r=armarios/registro-bodega" class="btn btn-default">Volver</a>

</div>
