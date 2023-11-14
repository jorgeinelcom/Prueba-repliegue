<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\modules\armarios\models\SaBodegas;
use app\modules\armarios\models\SaPallet;
use app\modules\armarios\models\SaArmario;
use app\modules\armarios\models\ApRepliegue;
use app\modules\armarios\models\SaRetiro;
use app\modules\armarios\models\SaRegistroBodega;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\armarios\models\SaRetiroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Retiros Realizados';
$this->params['breadcrumbs'][] = $this->title;

$columnas = [
    'id_registro_bodega',
            [
                'label' => 'Bodega',
                'value' => function ($model) {
                     $registro = SaRegistroBodega::find()->where(["id_registro_bodega" => $model->id_registro_bodega])->one();
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
                'value' => function ($model) {
                     $registro = SaRegistroBodega::find()->where(["id_registro_bodega" => $model->id_registro_bodega])->one();

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
                'value' => function ($model) {
                     $registro = SaRegistroBodega::find()->where(["id_registro_bodega" => $model->id_registro_bodega])->one();

                    if ($registro->repliegue) {
                    return $registro->repliegue->descripcion;
                    }else{
                        return "";
                    }
                },
               
            ],
            [
                'label' => 'Pallet',
                'value' => function ($model) {
                     $registro = SaRegistroBodega::find()->where(["id_registro_bodega" => $model->id_registro_bodega])->one();

                    if ($registro->id_pallet) {
                    return $registro->pallet->nombre;
                    }else{
                        return "";
                    }
                },
               
            ],
            [
                'label' => 'Armario',
                'value' => function ($model) {
                     $registro = SaRegistroBodega::find()->where(["id_registro_bodega" => $model->id_registro_bodega])->one();

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
                     $registro = SaRegistroBodega::find()->where(["id_registro_bodega" => $model->id_registro_bodega])->one();
                    return date('d-m-Y', strtotime($model->registroBodega->fecha_repliegue));
                }
            ],
            [
                'label' => 'Kilos Cu',
                'value' => function ($model) {
                     $registro = SaRegistroBodega::find()->where(["id_registro_bodega" => $model->id_registro_bodega])->one();
                    return $model->registroBodega->kilos_cu;
                }
            ],
            [
                'label' => 'Trozos',
                'value' => function ($model) {
                     $registro = SaRegistroBodega::find()->where(["id_registro_bodega" => $model->id_registro_bodega])->one();
                    return $model->registroBodega->trozos;
                }
            ],
            [
                'label' => 'Peso Pallet',
                'value' => function ($model) {
                     $registro = SaRegistroBodega::find()->where(["id_registro_bodega" => $model->id_registro_bodega])->one();
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
    ];

 

?>
<div class="sa-retiro-index">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <hr>

    <p>
        <?= Html::a('Registrar Retiro', ['registro-bodega/index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?= 
        ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'showColumnSelector' => false,
        'columns' => $columnas,
        'filename' => 'Retiro - '.date('Y-m-d'),
        'exportConfig' => [
            ExportMenu::FORMAT_TEXT => false,
            ExportMenu::FORMAT_HTML => false,
            ExportMenu::FORMAT_PDF => false,
            ExportMenu::FORMAT_CSV => false,
            ExportMenu::FORMAT_EXCEL => true,
           
            

        ],
        'dropdownOptions' => [
            'label' => 'Descargar',
            'class' => 'btn btn-outline-secondary btn-default'
        ]
    ])
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Buscar...'
                ],
                'attribute' => 'bodega',
                'format' => 'raw',
                'label' => 'Bodega',
                'value' => function ($model) {

                    if ($model->registroBodega->id_bodega) {
                        # code...
                    return $model->registroBodega->bodega->nombre;
                    }else{
                        return "";
                    }
                },
               'filter' => ArrayHelper::map(SaBodegas::find()->asArray()->all(), 'nombre', 'nombre'),
                    'filterType' => GridView::FILTER_SELECT2,
                    'filterWidgetOptions' => [
                        'options' => ['prompt' => ''],
                        'pluginOptions' => ['allowClear' => true,'placeholder' => 'Buscar...'],
                    ],
            ],

            [
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Buscar...'
                ],
                'attribute' => 'pallet',
                'format' => 'raw',
                'label' => 'N° Pallet / N° Fardo',
                'value' => function ($model) {

                    if ($model->registroBodega->id_pallet) {
                        # code...
                    return $model->registroBodega->pallet->nombre;
                    }else{
                        return "";
                    }
                },
               'filter' => ArrayHelper::map(SaPallet::find()->asArray()->all(), 'nombre', 'nombre'),
                    'filterType' => GridView::FILTER_SELECT2,
                    'filterWidgetOptions' => [
                        'options' => ['prompt' => ''],
                        'pluginOptions' => ['allowClear' => true,'placeholder' => 'Buscar...'],
                    ],
            ],

             [
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Buscar...'
                ],
                'attribute' => 'armario',
                'format' => 'raw',
                'label' => 'N° Armario / N° Matriz',
                'value' => function ($model) {

                    if ($model->registroBodega->id_armario) {
                        # code...
                    return $model->registroBodega->armario->descripcion;
                    }else{
                        return "";
                    }
                },
               'filter' => ArrayHelper::map(SaArmario::find()->asArray()->all(), 'descripcion', 'descripcion'),
                    'filterType' => GridView::FILTER_SELECT2,
                    'filterWidgetOptions' => [
                        'options' => ['prompt' => ''],
                        'pluginOptions' => ['allowClear' => true,'placeholder' => 'Buscar...'],
                    ],
            ],

            [
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Buscar...'
                ],
                'attribute' => 'fec_repliegue',
                'format' => 'raw',
                'label' => 'Fec Repliegue',
                'value' => function ($model) {
                    return date('d-m-Y', strtotime($model->registroBodega->fecha_repliegue));
                }
            ],
            [
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Buscar...'
                ],
                'attribute' => 'kg_cu',
                'format' => 'raw',
                'label' => 'Kilos Cu',
                'value' => function ($model) {
                    return $model->registroBodega->kilos_cu;
                }
            ],
            [
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Buscar...'
                ],
                'attribute' => 'trozos',
                'format' => 'raw',
                'label' => 'Trozos',
                'value' => function ($model) {
                    return $model->registroBodega->trozos;
                }
            ],
            [
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Buscar...'
                ],
                'attribute' => 'peso_pallet',
                'format' => 'raw',
                'label' => 'Peso Pallet',
                'value' => function ($model) {
                    return $model->registroBodega->peso_pallet;
                }
            ],
            //'id_registro_bodega',
            //'lote',
            'retiro',
            
            
            [
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Buscar...'
                ],
                'attribute' => 'fecha_entrega',
                'format' => 'raw',
                'label' => 'Fec Entrega',
                'value' => function ($model) {
                    return date('d-m-Y', strtotime($model->fecha_entrega));
                }
            ],

  
            'peso_total_telefonica',
            'peso_neto_cable',
            'diferencia',
            'destino_entrega',
            //'acta_servicio',
            //'fecha_acta',
            //'id_estado',
            //'kg_bodega_inelcom',
            //'rut_usuario',
            //'create_at',

            [
                'label'=>'Acción',
                'format'=>'raw',
               
                'value'=>function($model){
                     
                     
                       
                    return '<a title="Ver" style="font-size: 12px!important;"  class="btn btn-info mg2 orange" href="index.php?r=armarios/retiro/view&id='.$model->id_retiro.'"><i class="fas fa-eye"></i></a><a title="Editar" style="font-size: 12px!important;"  class="btn btn-info mg2 orange" href="index.php?r=armarios/retiro/update&id='.$model->id_retiro.'&idRegistro='.$model->id_registro_bodega.'"><i class="fas fa-edit"></i></a>';
                
                
                    }
            

         ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

<style>div#contenedor-principal {
    width: fit-content;
}</style>