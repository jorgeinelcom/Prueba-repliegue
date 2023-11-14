<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\armarios\models\SaRegistroBodegaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sa-registro-bodega-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_registro_bodega') ?>

    <?= $form->field($model, 'id_bodega') ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_repliegue') ?>

    <?= $form->field($model, 'id_pallet') ?>

    <?php // echo $form->field($model, 'id_armario') ?>

    <?php // echo $form->field($model, 'fecha_repliegue') ?>

    <?php // echo $form->field($model, 'kilos_cu') ?>

    <?php // echo $form->field($model, 'trozos') ?>

    <?php // echo $form->field($model, 'peso_pallet') ?>

    <?php // echo $form->field($model, 'rut_usuario') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
