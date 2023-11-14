<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\armarios\models\SaOcSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sa-oc-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_oc') ?>

    <?= $form->field($model, 'id_agencia') ?>

    <?= $form->field($model, 'id_comuna') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'nombre') ?>

    <?php // echo $form->field($model, 'omonimo') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
