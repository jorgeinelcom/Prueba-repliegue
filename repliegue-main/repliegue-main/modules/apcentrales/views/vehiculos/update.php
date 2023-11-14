<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\apcentrales\models\ApVehiculos */

$this->title = 'Editar Vehiculos: ' . $model->patente;
$this->params['breadcrumbs'][] = ['label' => 'Ap Vehiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idvehiculos, 'url' => ['view', 'id' => $model->idvehiculos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ap-vehiculos-update">

<div class="col-md-12">
<h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <hr>
        </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
