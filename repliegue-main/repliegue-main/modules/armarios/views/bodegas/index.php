<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\armarios\models\SaBodegasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bodegas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sa-bodegas-index">
<script  src="https://code.jquery.com/jquery-2.2.4.min.js"  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <hr>
    <p>
        <?= Html::a('Crear Bodegas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
 
            'nombre',
            'direccion',
 
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
