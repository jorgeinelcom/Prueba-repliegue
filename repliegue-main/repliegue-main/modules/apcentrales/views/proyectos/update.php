<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\apcentrales\models\ApProyectos */

$this->title = 'Update Ap Proyectos: ' . $model->idproyectos;
$this->params['breadcrumbs'][] = ['label' => 'Ap Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idproyectos, 'url' => ['view', 'id' => $model->idproyectos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ap-proyectos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
