<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\armarios\models\SaRegistroBodega */

$this->title = 'Crear Registro Bodega';
$this->params['breadcrumbs'][] = ['label' => 'Sa Registro Bodegas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sa-registro-bodega-create">
     <div class="col-md-12">
<div class="col-md-12">
<h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <hr>
    </div>
        </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
