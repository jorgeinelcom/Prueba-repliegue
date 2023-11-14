<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\modules\apcentrales\models\ApPersonas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">

    <?php $form = ActiveForm::begin(); ?>


<div class="col-md-12">
    <div class="col-md-4">
    <?= $form->field($model, 'rutPersona')->textInput() ?>
    </div>
    <div class="col-md-2">
    <?= $form->field($model, 'dvPersona')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-6">
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>
    </div>
     </div>
     <div class="col-md-12">
    <div class="col-md-4">
    <?= $form->field($model, 'fono')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
   <?= $form->field($model, 'id_subcontratistas')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(app\modules\apcentrales\models\ApSubcontratistas::find()->all(), 'id_subcontratistas', function($model){ return $model->nombre;}),
                  'options' => ['placeholder' => 'Buscar Subcontratista...']
              ])->label("Subcontratista"); ?>
     </div>
     </div>
<div class="col-md-12">
    <div class="pdlf15">
          <?= $form->errorSummary($model); ?>
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-info']) ?>
        <a href="index.php?r=apcentrales/personas" class="btn btn-default">Volver</a>
      </div>
     </div>

    <?php ActiveForm::end(); ?>

</div>
