<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\Usuarios\models\Cargo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cargo-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-4">
      <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-4">
      <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-4">
      <?= Html::submitButton('Guardar', ['class' => 'btn btn-success btn-block btn-top']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
