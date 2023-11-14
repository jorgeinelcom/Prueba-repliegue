<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\modules\apcentrales\models\ApProyectos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-12">
        <div class="col-md-4">
    <?= $form->field($model, 'num_cubicacion')->textInput() ?>
</div>
<div class="col-md-4">
    <?= $form->field($model, 'oc')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-4">
     <label class="control-label" for="proyecto-fecha-asignacion">Fecha Asignacion</label>
      <?= 
            DatePicker::widget([
            'name' => 'fechaAsignacion',
            'options' => ['placeholder' => 'Seleccione Fecha ', 'required' => true],

              'value' => date('d-m-Y'),
            'pluginOptions' => [
                'required' => true,
                'format' => 'dd-mm-yyyy',
                'todayHighlight' => true
        ]]); ?>
</div>
    </div>

        <div class="col-md-12">
            <div class="col-md-4">
    <?= $form->field($model, 'mts_proyectados_cable')->textInput(["type" => "number", "min" => 0]) ?>
</div>
<div class="col-md-4">
    <?= $form->field($model, 'kg_proyectados_cable')->textInput(["type" => "number", "min" => 0]) ?>
</div>
<div class="col-md-4">
        <?= $form->field($model, 'inspector_asignado')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(app\modules\apcentrales\models\CoreUsuario::find()->all(), 'rut_usuario', function($model){ return $model->nombre.' '.$model->apellidos;}),
                  'options' => ['placeholder' => 'Buscar Inspector...']
              ])->label("Inspector Asignado"); ?>

 </div>
 </div>
 
     <div class="col-md-12">
        <div class="col-md-4">
        <?= $form->field($model, 'id_repliegue')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(app\modules\apcentrales\models\ApRepliegue::find()->all(), 'id_repliegue', function($model){ return $model->descripcion;}),
                  'options' => ['placeholder' => 'Buscar Repliegue...']
              ])->label("Repliegue"); ?>

 </div>

<div class="col-md-4">
    <?= $form->field($model, 'id_subcontratistas')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(app\modules\apcentrales\models\ApSubcontratistas::find()->all(), 'id_subcontratistas', function($model){ return $model->nombre;}),
                  'options' => ['placeholder' => 'Buscar Subcontratista...']
              ])->label("Subcontratista"); ?>
</div>
<div class="col-md-4">
   <?= $form->field($model, 'id_estados_proyecto')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(app\modules\apcentrales\models\ApEstadosProyecto::find()->all(), 'id_estados_proyecto', function($model){ return $model->nombre;}),
                  'options' => ['placeholder' => 'Buscar Estado...']
              ])->label("Estado"); ?>
</div>
</div>
    <div class="col-md-12">
        <div class="pdlf15">
          <?= $form->errorSummary($model); ?>
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-info']) ?>
        <a href="index.php?r=apcentrales/proyectos" class="btn btn-default">Volver</a>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
