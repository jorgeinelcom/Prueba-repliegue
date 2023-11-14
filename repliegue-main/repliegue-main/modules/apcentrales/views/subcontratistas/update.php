<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\apcentrales\models\ApSubcontratistas */

$this->title = 'Update Ap Subcontratistas: ' . $model->id_subcontratistas;
$this->params['breadcrumbs'][] = ['label' => 'Ap Subcontratistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_subcontratistas, 'url' => ['view', 'id' => $model->id_subcontratistas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ap-subcontratistas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
