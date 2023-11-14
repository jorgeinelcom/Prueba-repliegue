<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\armarios\models\SaBodegas */

$this->title = 'Update Sa Bodegas: ' . $model->id_bodegas;
$this->params['breadcrumbs'][] = ['label' => 'Sa Bodegas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bodegas, 'url' => ['view', 'id' => $model->id_bodegas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sa-bodegas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
