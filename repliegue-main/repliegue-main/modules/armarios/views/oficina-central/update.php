<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\armarios\models\SaOc */

$this->title = 'Update Sa Oc: ' . $model->id_oc;
$this->params['breadcrumbs'][] = ['label' => 'Sa Ocs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_oc, 'url' => ['view', 'id' => $model->id_oc]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sa-oc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
