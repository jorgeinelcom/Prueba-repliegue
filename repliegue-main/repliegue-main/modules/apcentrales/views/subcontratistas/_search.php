<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\apcentrales\models\ApSubcontratistasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ap-subcontratistas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_subcontratistas') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'create_at') ?>

    <?= $form->field($model, 'precio_aereo') ?>

    <?= $form->field($model, 'precio_matriz') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
