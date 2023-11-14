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
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\armarios\models\SaRegistroBodegaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registro Bodegas';
$this->params['breadcrumbs'][] = $this->title;

$columnas = [
    [
        'label' => 'Bodega',
        'value' => function ($model) {
            if ($model->id_bodega) {
                return $model->bodega->nombre;
            }else{
                return "";
            }
        },
    ],
    'id',
    'id_autorizacion',
    [
        'label' => 'Tipo Material',
        'value' => function ($model) {
            if ($model->id_repliegue) {
                return $model->repliegue->descripcion;
            }else{
                return "";
            }
        },
    ],
    [
        'label' => 'N° Pallet / N° Fardo',
        'value' => function ($model) {
            if ($model->id_pallet) {
                return $model->pallet->nombre;
            }else{
                return "";
            }
        },
    ],
    [
        'label' => 'N° Armario / N° Matriz',
        'value' => function ($model) {
            if ($model->id_armario) {
                return $model->armario->descripcion;
            }else{
                return "";
            }
        },
    ],
    [
        'label' => 'Fecha Repliegue',
        'value' => function ($model) {
            return date('d-m-Y', strtotime($model->fecha_repliegue));
        }
    ],
    'kilos_cu',
    'trozos',
    'peso_pallet',
    'oc.nombre',
            //'rut_usuario',
            //'create_at',

 

];


?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<div class="sa-registro-bodega-index">

    <h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <hr>

    <p>
        <?= Html::a('Crear Nuevo Registro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?= 
        ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'showColumnSelector' => false,
        'columns' => $columnas,
        'filename' => 'Registro Bodega - '.date('Y-m-d'),
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
                'attribute' => 'id_bodega',
                'format' => 'raw',
                'label' => 'Bodega',
                'value' => function ($model) {

                    if ($model->id_bodega) {
                        # code...
                    return $model->bodega->nombre;
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
            'id',

            [
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Buscar...'
                ],
                'attribute' => 'id_repliegue',
                'format' => 'raw',
                'label' => 'Tipo Material',
                'value' => function ($model) {

                    if ($model->id_repliegue) {
                        # code...
                    return $model->repliegue->descripcion;
                    }else{
                        return "";
                    }
                },
               'filter' => ArrayHelper::map(ApRepliegue::find()->asArray()->all(), 'descripcion', 'descripcion'),
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
                'attribute' => 'id_pallet',
                'format' => 'raw',
                'label' => 'N° Pallet / N° Fardo',
                'value' => function ($model) {

                    if ($model->id_pallet) {
                        # code...
                    return $model->pallet->nombre;
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
                'attribute' => 'id_armario',
                'format' => 'raw',
                'label' => 'N° Armario / N° Matriz',
                'value' => function ($model) {

                    if ($model->id_armario) {
                        # code...
                    return $model->armario->descripcion;
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
            //'rut_usuario',
            //'create_at',


            [
                'label'=>'Acción',
                'format'=>'raw',
               
                'value'=>function($model){
                     
                    $retiro = SaRetiro::find()->where(["id_registro_bodega" => $model->id_registro_bodega])->one();    
                    if ($retiro) {
                        $btnRetiro = '<a title="Ver Retiro" style="font-size: 12px!important;background-color:#8bc34a;border-color:#8bc34a;width:100%;" class="btn btn-info mg2 orange" href="index.php?r=armarios/retiro/view&id='.$retiro->id_retiro.'""> Ver Retiro </a>';
                    }else{
                        $btnRetiro = '<a title="Retiro" style="font-size: 12px!important;background-color:#8bc34a;border-color:#8bc34a;width:100%;" class="btn btn-info mg2 orange" href="index.php?r=armarios/retiro/create&idRegistro='.$model->id_registro_bodega.'""> Registrar Retiro </a>';
                    }
                       
                    return '<a title="Ver" style="font-size: 12px!important;"  class="btn btn-info mg2 orange" href="index.php?r=armarios/registro-bodega/view&id='.$model->id_registro_bodega.'"><i class="fas fa-eye"></i></a><a title="Editar" style="font-size: 12px!important;"  class="btn btn-info mg2 orange" href="index.php?r=armarios/registro-bodega/update&id='.$model->id_registro_bodega.'"><i class="fas fa-edit"></i></a><a title="Ver" style="font-size: 12px!important;width:100%;"  class="btn btn-info mg2 orange" href="index.php?r=armarios/registro-bodega/ingreso-cables&id='.$model->id_registro_bodega.'">Detalle Cable</a>'.$btnRetiro;
                
                
                    }
            

         ],


  
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
