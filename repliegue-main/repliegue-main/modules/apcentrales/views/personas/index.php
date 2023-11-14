<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\apcentrales\models\ApPersonasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<script  src="https://code.jquery.com/jquery-2.2.4.min.js"  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<div class="ap-personas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Persona', ['create'], ['class' => 'btn btn-info']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

    
            'rutPersona',
            'dvPersona',
            'nombre',
            'apellido',
            'fono',
            'correo',
            'subcontratistas.nombre',
            //'id_categorias_personas',
            //'id_estados',

            [
                'label'=>'Acción',
                'format'=>'raw',
                 'headerOptions' => ['style' => '  width: 15%!important;'],
               
                'value'=>function($model){
                   
                        // code...
                    return '<a title="Ver" style="font-size: 12px!important;"  class="btn btn-info mg2 orange" href="index.php?r=apcentrales/personas/view&id='.$model->idpersonas.'"><i class="fas fa-eye"></i></a><a title="Editar" style="font-size: 12px!important;"  class="btn btn-info mg2 orange" href="index.php?r=apcentrales/personas/update&id='.$model->idpersonas.'"><i class="fas fa-edit"></i></a>
                    ';
                   
                 }
            

         ],
 
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
