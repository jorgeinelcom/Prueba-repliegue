<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\Permisos\models\PermisosUsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Permisos de Usuarios';

?>
<script  src="https://code.jquery.com/jquery-2.2.4.min.js"  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<div class="card">

    <div class="col-md-10">
      <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-md-2">
      <p>
        <?= Html::a('Añadir Permiso <i class="fas fa-plus"></i>', ['create'], ['class' => 'btn btn-success fr btn-top']) ?>
      </p>
    </div>

    <div class="col-md-12">
      <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
          'id_permisos_usuarios',
          [
            'attribute' => 'id_permiso',
            'label' => 'Permiso',
            'value' => function($model){
              return $model->permiso->nombre;
            }
          ],
          [
            'attribute' => 'rut_usuario',
            'label' => 'Usuario',
            'value' => function($model){
              return $model->rutUsuario->fullName;
            }
          ],

          'created_at',

          ['class' => 'yii\grid\ActionColumn'],
        ],
      ]); ?>
    </div>

    <div class="clearfix"></div>

</div>
