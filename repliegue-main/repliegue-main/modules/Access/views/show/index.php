<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use kartik\date\DatePicker;

$gridColumns = [

  [
    'attribute' => 'id_access',
    'label' => 'ID',
    'format' => 'raw',
    'value' => function($model){
      return $model->id_access;
    }
  ],
  [
    'attribute' => 'username',
    'label' => 'Nombre Usuario',
    'format' => 'raw',
    'value' => function($model){
      return $model->username;
    }
  ],
  [
    'attribute' => 'rut_usuario',
    'label' => 'Rut Usuario',
    'format' => 'raw',
    'value' => function($model){
      return $model->rut_usuario;
    }
  ],
  [
    'attribute' => 'id_interaction',
    'label' => 'interacción',
    'format' => 'raw',
    'value' => function($model){
      return $model->interaction->name;
    }
  ],
  [
    'attribute' => 'created_at',
    'label' => 'Fecha',
    'format' => 'raw',
    'filter' => DatePicker::widget([ 'type' => DatePicker::TYPE_INPUT,'model' => $searchModel, 'attribute' => 'created_at', 'name' => 'fecha', 'pluginOptions' => ['format' => 'yyyy-mm-dd']]),
    'value' => function($model){
      return $model->created_at;
    }
  ]

];

 ?>

 
<div class="card shadow">
  <h2>Control de Acceso</h2>
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
</div>


<style media="screen">
  .card{
    background: #fff;
    border-radius: 8px;
  }
  body{
    background: #f1f1f1!important;
  }
</style>
