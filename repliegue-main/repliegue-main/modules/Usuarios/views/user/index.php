<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;


$this->title = 'Usuarios';


$gridColumns = [

    'rut_usuario',
    'nombre',
    'apellidos',
    'correo',
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
    ['class' => 'yii\grid\ActionColumn'],
];



?>

<script  src="https://code.jquery.com/jquery-2.2.4.min.js"  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 
<div class="card">


<div class="col-md-10">
    <h1>Listado de usuarios</h1>
</div>
<div class="col-md-2">
    <p>
        <?= Html::a('Crear Usuario <i class="fas fa-plus"></i>', ['create'], ['class' => 'btn btn-success btn-top fr']) ?>
    </p>
</div>

<div class="col-md-12">

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#activos">Usuarios Activos</a></li>
  <li><a data-toggle="tab" href="#inactivos">Usuarios Inactivos</a></li>
</ul>

<div class="tab-content">

  <div id="activos" class="tab-pane fade in active">
    <?php Pjax::begin(); ?>
        <?=
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns,
                'exportConfig' => [
                ExportMenu::FORMAT_TEXT => false,
                ExportMenu::FORMAT_HTML => false,
                ExportMenu::FORMAT_EXCEL => false,
                ExportMenu::FORMAT_PDF => false,
                ]
            ])
            .
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => false,
                'columns' => $gridColumns,
            ]);
        ?>
    <?php Pjax::end(); ?>
  </div>

  <div id="inactivos" class="tab-pane fade">
    <?php Pjax::begin(); ?>
        <?=
            ExportMenu::widget([
                'dataProvider' => $dataProviderInactivos,
                'columns' => $gridColumns,
                'exportConfig' => [
                ExportMenu::FORMAT_TEXT => false,
                ExportMenu::FORMAT_HTML => false,
                ExportMenu::FORMAT_EXCEL => false,
                ExportMenu::FORMAT_PDF => false,
                ]
            ])
            .
            GridView::widget([
                'dataProvider' => $dataProviderInactivos,
                'filterModel' => $searchModelInactivos,
                'summary' => false,
                'columns' => $gridColumns,
            ]);
        ?>
    <?php Pjax::end(); ?>
  </div>

</div>




<style>
.nav-tabs > li {
    width: 50%;
}
.tab-content{
    margin: 10px 5px;
}
</style>




</div>

  <div class="clearfix"></div>



</div>
