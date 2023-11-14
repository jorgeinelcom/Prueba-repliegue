<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\armarios\models\SaRetiro */

$this->title = 'Update Sa Retiro: ' . $model->id_retiro;
$this->params['breadcrumbs'][] = ['label' => 'Sa Retiros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_retiro, 'url' => ['view', 'id' => $model->id_retiro]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sa-retiro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'registro' => $registro
    ]) ?>

</div>
