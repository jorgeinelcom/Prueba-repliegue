<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use app\modules\armarios\models\SaAgencia;
use app\modules\armarios\models\SaComuna;
use yii\helpers\ArrayHelper;;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\armarios\models\SaOcSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Oficina Central';
$this->params['breadcrumbs'][] = $this->title;
?>
<script  src="https://code.jquery.com/jquery-2.2.4.min.js"  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<div class="sa-oc-index">

    <h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <hr>
    <p>
        <?= Html::a('Crear Oficina Central', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
                'attribute' => 'id_agencia',
                'format' => 'raw',
                'label' => 'Agencia',
                'value' => function ($model) {

                    if ($model->id_agencia) {
                        # code...
                    return $model->agencia->nombre;
                    }else{
                        return "";
                    }
                },
               'filter' => ArrayHelper::map(SaAgencia::find()->asArray()->all(), 'nombre', 'nombre'),
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
                'attribute' => 'id_comuna',
                'format' => 'raw',
                'label' => 'Comuna',
                'value' => function ($model) {

                    if ($model->id_comuna) {
                    return $model->comuna->nombre;
                    }else{
                        return "";
                    }
                },
               'filter' => ArrayHelper::map(SaComuna::find()->asArray()->all(), 'nombre', 'nombre'),
                    'filterType' => GridView::FILTER_SELECT2,
                    'filterWidgetOptions' => [
                        'options' => ['prompt' => ''],
                        'pluginOptions' => ['allowClear' => true,'placeholder' => 'Buscar...'],
                    ],
            ],
            'descripcion',
            'nombre',
            'omonimo',
            //'create_at',

          
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
