<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\apcentrales\models\ApSubcontratistas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ap-subcontratistas-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-12">
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-6">
    <?= $form->field($model, 'precio_aereo')->textInput()->label("Precio Aéreo") ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'precio_matriz')->textInput()->label("Precio Matríz") ?>
    </div>
    <div class="form-group pdlf15">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-info']) ?>
        <a href="index.php?r=apcentrales/subcontratistas" class="btn btn-default">Volver</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
