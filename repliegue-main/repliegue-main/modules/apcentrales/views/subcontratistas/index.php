<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\apcentrales\models\ApSubcontratistasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subcontratistas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ap-subcontratistas-index">
<script  src="https://code.jquery.com/jquery-2.2.4.min.js"  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <hr>
    <p>
        <?= Html::a('Crear Subcontratistas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

 
            'nombre',
            'create_at',
            'precio_aereo',
            'precio_matriz',

            [
                'label'=>'Acción',
                'format'=>'raw',
               
                'value'=>function($model){
                     
                     
                       
                    return '<a title="Ver" style="font-size: 12px!important;"  class="btn btn-info mg2 orange" href="index.php?r=apcentrales/subcontratistas/view&id='.$model->id_subcontratistas.'"><i class="fas fa-eye"></i></a><a title="Editar" style="font-size: 12px!important;"  class="btn btn-info mg2 orange" href="index.php?r=apcentrales/subcontratistas/update&id='.$model->id_subcontratistas.'"><i class="fas fa-edit"></i></a>';
                
                
                    }
            

        
        ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
