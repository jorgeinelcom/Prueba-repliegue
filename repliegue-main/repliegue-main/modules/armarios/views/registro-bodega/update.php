<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\armarios\models\SaRegistroBodega */

$this->title = 'Update Sa Registro Bodega: ' . $model->id_registro_bodega;
$this->params['breadcrumbs'][] = ['label' => 'Sa Registro Bodegas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_registro_bodega, 'url' => ['view', 'id' => $model->id_registro_bodega]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sa-registro-bodega-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
