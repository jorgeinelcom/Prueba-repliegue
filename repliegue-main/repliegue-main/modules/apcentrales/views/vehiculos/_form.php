<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\modules\apcentrales\models\ApVehiculos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">

   

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-12">
    <div class="col-md-4">
    <?= $form->field($model, 'patente')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    <div class="col-md-12">
    <div class="col-md-4">
    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>
     </div>
     <div class="col-md-4">
    <?= $form->field($model, 'anio')->textInput(["type" => "number", "min" => 1])->label("Año") ?>
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
        <a href="index.php?r=apcentrales/vehiculos" class="btn btn-default">Volver</a>
      </div>
     </div>
    <?php ActiveForm::end(); ?>

   

</div>
