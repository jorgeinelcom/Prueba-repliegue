<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\apcentrales\models\ProyectosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proyectos Armario';
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style type="text/css">
    div#contenedor-principal {
    width: 85%;
}

</style>
 
<div class="card">
    <div class="row">
<div class="col-md-12"> 
    <h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <hr>

    <p>
        <?= Html::a('Crear Proyecto', ['create'], ['class' => 'btn btn-info']) ?>
    </p>
<div class="table-responsive">
 

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'num_cubicacion',
            'oc',
            'fec_asignacion',
            'mts_proyectados_cable',
            'mts_reales',
            'kg_proyectados_cable',
            'kg_reales',
            //'create_at',
            'repliegue.descripcion',
            'subcontratistas.nombre',
            'estadosProyecto.nombre',

            [
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Buscar...'
                ],
                    'headerOptions' => ['style' => 'text-align: left;'],
                'contentOptions' => ['style' => ' text-align: left;'],
                
                'format' => 'raw',
                'label' => 'Avance Mts',
                'value' => function($model){

                    $mtsReales= $model->mts_reales;
                    
                    $porcentaje = $mtsReales * 100 / $model->mts_proyectados_cable;

                    $mtsReales= $model->mts_proyectados_cable;

                    if($mtsReales <= 0){
                        $porcentaje = 0;
                    }else{
                        $porcentaje = $mtsReales * 100 / $model->mts_proyectados_cable;
                    }

                    
                        if($mtsReales){
                            if ($porcentaje > 100) {
                                $totalmts = $model->mts_proyectados_cable;
                                $color = '#880000!important;color:white!important';
                                $poc = 100;
                            }else{
                                $totalmts = $mtsReales;
                                $color= '#b5cae2!important;color';
                                $poc = $porcentaje;

                            }
                    
                        $avance = ' <div class="w3-light-grey">
                  <div class="w3-grey" style="background-color: '.$color.';    height: 15px;width:'.$poc.'%"><p style="font-size: 12px;text-align: right;"> '.$poc.'%</p></div>
                </div>';
                            return $avance;
                        


                        }else{

                        $avance = ' <div class="w3-light-grey">
                  <div class="w3-grey" style="background-color: #769fcd!important;    height: 15px;width:0%"><p style="font-size: 12px;text-align: right;"> 5%</p></div>
                </div>';

                            return 'Sin Info';
                        }
                    
                }
            ],

            [
                'filterInputOptions' => [
                    'class'       => 'form-control',
                    'placeholder' => 'Buscar...'
                ],
                    'headerOptions' => ['style' => 'text-align: left;'],
                'contentOptions' => ['style' => ' text-align: left;'],
                
                'format' => 'raw',
                'label' => 'Avance Kgs',
                'value' => function($model){

                    $kgReales= $model->kg_reales;

                    if($kgReales <= 0){
                        $porcentaje = 0;
                    }else{
                        $porcentaje = $kgReales * 100 / $model->kg_proyectados_cable;
                    }
                    
                    

                    
                        if($kgReales){
                            if ($porcentaje > 100) {
                                $totalmts = $model->kg_proyectados_cable;
                                $color = '#880000!important;color:white!important';
                                $poc = 100;
                            }else{
                                $totalmts = $kgReales;
                                $color= '#b5cae2!important;color';
                                $poc = $porcentaje;

                            }
                    
                        $avance = ' <div class="w3-light-grey">
                  <div class="w3-grey" style="background-color: '.$color.';    height: 15px;width:'.$poc.'%"><p style="font-size: 12px;text-align: right;"> '.$poc.'%</p></div>
                </div>';
                            return $avance;
                        


                        }else{

                        $avance = ' <div class="w3-light-grey">
                  <div class="w3-grey" style="background-color: #769fcd!important;    height: 15px;width:0%"><p style="font-size: 12px;text-align: right;"> 5%</p></div>
                </div>';

                            return 'Sin Info';
                        }
                    
                }
            ],

            [
                'label'=>'Acción',
                'format'=>'raw',
                 'headerOptions' => ['style' => '  width: 15%!important;'],
               
                'value'=>function($model){
                   
                        // code...
                    return '<a title="Ver" style="font-size: 12px!important;"  class="btn btn-info mg2 orange" href="index.php?r=apcentrales/proyectos/view&id='.$model->idproyectos.'"><i class="fas fa-eye"></i></a><a title="Editar" style="font-size: 12px!important;"  class="btn btn-info mg2 orange" href="index.php?r=apcentrales/proyectos/update&id='.$model->idproyectos.'"><i class="fas fa-edit"></i></a><a title="Ver" style="font-size: 12px!important;"  class="btn btn-success mg2 orange" href="index.php?r=apcentrales/proyectos/checklist&id='.$model->idproyectos.'"><i class="fa-solid fa-clipboard-check"></i></a><a title="Avance" style="font-size: 12px!important;"  class="btn btn-success mg2 orange purple" href="index.php?r=apcentrales/proyectos/avance-retiro&id='.$model->idproyectos.'"><i class="fa-solid fa-forward"></i></a>
                    ';
                   
                 }
            

         ],


           
        ],
    ]); ?>

    <?php Pjax::end(); ?>
    </div>
</div>
</div>
</div>

<style type="text/css">
    .purple{
        background-color: purple!important;
        border-color: purple;
    }
    .w3-light-grey, .w3-hover-light-grey:hover, .w3-light-gray, .w3-hover-light-gray:hover {
    color: #000!important;
    background-color: #d7d7d7!important;
}
</style>