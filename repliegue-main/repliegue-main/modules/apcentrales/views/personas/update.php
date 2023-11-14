<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\apcentrales\models\ApPersonas */

$this->title = 'Actualizar: ' . $model->nombre .' '. $model->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Ap Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpersonas, 'url' => ['view', 'id' => $model->idpersonas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ap-personas-update">

<div class="col-md-12">
<h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <hr>
        </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
