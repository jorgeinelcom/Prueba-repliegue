<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\Usuarios\models\ProyectoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proyectos';
$this->params['breadcrumbs'][] = $this->title;
?>
<script  src="https://code.jquery.com/jquery-2.2.4.min.js"  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<div class="card">

  <div class="col-md-10">
    <h1><?= Html::encode($this->title) ?></h1>
  </div>

  <div class="col-md-2">
    <p>
      <?= Html::a('Añadir Proyecto <i class="fas fa-plus"></i>', ['create'], ['class' => 'btn btn-success fr btn-top']) ?>
    </p>
  </div>

    <div class="col-md-12">

      <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [

          'id_proyecto',
          'nombre',
          'descripcion',
          'created_at',

          ['class' => 'yii\grid\ActionColumn'],
        ],
      ]); ?>
    </div>


<div class="clearfix"></div>

</div>
