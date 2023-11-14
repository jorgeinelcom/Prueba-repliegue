<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\armarios\models\SaRetiroSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sa-retiro-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_retiro') ?>

    <?= $form->field($model, 'id_registro_bodega') ?>

    <?= $form->field($model, 'lote') ?>

    <?= $form->field($model, 'retiro') ?>

    <?= $form->field($model, 'guia_despacho') ?>

    <?php // echo $form->field($model, 'fecha_entrega') ?>

    <?php // echo $form->field($model, 'peso_total_telefonica') ?>

    <?php // echo $form->field($model, 'peso_neto_cable') ?>

    <?php // echo $form->field($model, 'diferencia') ?>

    <?php // echo $form->field($model, 'destino_entrega') ?>

    <?php // echo $form->field($model, 'acta_servicio') ?>

    <?php // echo $form->field($model, 'fecha_acta') ?>

    <?php // echo $form->field($model, 'id_estado') ?>

    <?php // echo $form->field($model, 'kg_bodega_inelcom') ?>

    <?php // echo $form->field($model, 'rut_usuario') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
