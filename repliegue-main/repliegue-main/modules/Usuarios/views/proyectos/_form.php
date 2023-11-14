<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\Usuarios\models\Proyecto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyecto-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-4">
      <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-4">
      <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-4">
      <?= Html::submitButton('Guardar <i class="fas fa-save"></i>', ['class' => 'btn btn-success btn-block btn-top']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
