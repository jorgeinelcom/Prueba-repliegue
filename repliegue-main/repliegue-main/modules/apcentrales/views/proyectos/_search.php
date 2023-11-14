<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\apcentrales\models\ProyectosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ap-proyectos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idproyectos') ?>

    <?= $form->field($model, 'num_cubicacion') ?>

    <?= $form->field($model, 'oc') ?>

    <?= $form->field($model, 'fec_asignacion') ?>

    <?= $form->field($model, 'mts_proyectados_cable') ?>

    <?php // echo $form->field($model, 'kg_proyectados_cable') ?>

    <?php // echo $form->field($model, 'mts_reales') ?>

    <?php // echo $form->field($model, 'kg_reales') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <?php // echo $form->field($model, 'id_repliegue') ?>

    <?php // echo $form->field($model, 'id_subcontratistas') ?>

    <?php // echo $form->field($model, 'id_estados_proyecto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
