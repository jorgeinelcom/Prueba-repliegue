<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\armarios\models\SaRetiro */

$this->title = $registro->pallet->nombre.' - '.$registro->armario->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Sa Retiros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sa-retiro-view">
<h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <hr>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id_retiro], ['class' => 'btn btn-info']) ?>
     
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_registro_bodega',
            [
                'label' => 'Bodega',
                'value' => function ($model) use ($registro) {

                    if ($model->registroBodega->id_bodega) {
                        # code...
                    return $model->registroBodega->bodega->nombre;
                    }else{
                        return "";
                    }
                },
               
            ],
            [
                'label' => 'Id',
                'value' => function ($model) use ($registro) {

                    if ($model->registroBodega->id) {
                        # code...
                    return $model->registroBodega->id;
                    }else{
                        return "";
                    }
                },
               
            ],
            [
                'label' => 'Repliegue',
                'value' => function ($model) use ($registro) {

                    if ($registro->repliegue) {
                    return $registro->repliegue->descripcion;
                    }else{
                        return "";
                    }
                },
               
            ],
            [
                'label' => 'Pallet',
                'value' => function ($model) use ($registro) {

                    if ($registro->id_pallet) {
                    return $registro->pallet->nombre;
                    }else{
                        return "";
                    }
                },
               
            ],
            [
                'label' => 'Armario',
                'value' => function ($model) use ($registro) {

                    if ($model->registroBodega->armario) {
                        # code...
                    return $model->registroBodega->armario->descripcion;
                    }else{
                        return "";
                    }
                },
               
            ],
            [
                'label' => 'Fecha Repliegue',
                'value' => function ($model) {
                    return date('d-m-Y', strtotime($model->registroBodega->fecha_repliegue));
                }
            ],
            [
                'label' => 'Kilos Cu',
                'value' => function ($model) {
                    return $model->registroBodega->kilos_cu;
                }
            ],
            [
                'label' => 'Trozos',
                'value' => function ($model) {
                    return $model->registroBodega->trozos;
                }
            ],
            [
                'label' => 'Peso Pallet',
                'value' => function ($model) {
                    return $model->registroBodega->peso_pallet;
                }
            ],
            'lote',
            'retiro',
            'guia_despacho',
            'fecha_entrega',
            'peso_total_telefonica',
            'peso_neto_cable',
            'diferencia',
            'destino_entrega',
            'acta_servicio',
            'fecha_acta',
            'estado.descripcion',
            'kg_bodega_inelcom',
        ],
    ]) ?>
  <a href="index.php?r=armarios/registro-bodega" class="btn btn-default">Volver</a>

</div>
