<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\modules\apcentrales\models\ApProyectos */

$this->title = 'Seleccionar Cuadrilla';
$this->params['breadcrumbs'][] = ['label' => 'Ap Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">
    <div class="card">
        <h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <hr>
        <div class="card-content">
            <div class="row">
             <?php $form = ActiveForm::begin(); ?>
                <div class="col-md-12">
                      <div class="col-md-12">
                     <?= $form->field($personaProyecto, 'idpersonas')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(app\modules\apcentrales\models\ApPersonas::find()->where(["id_subcontratistas" => $model->id_subcontratistas, "id_estados" => 1])->all(), 'idpersonas', function($model){ return $model->nombre.' '.$model->apellido;}),
                  'options' => ['placeholder' => 'Buscar Personas...'], 'pluginOptions'=>[
                'initialize' => true, 'multiple' => true,
                'required' => 'true'
            ]
              ])->label("Seleccionar Personas"); ?>
                </div>
            </div>

            <div class="col-md-12">
                      <div class="col-md-12">
                     <?= $form->field($vehiculosProyecto, 'idvehiculos')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(app\modules\apcentrales\models\ApVehiculos::find()->where(["id_subcontratistas" => $model->id_subcontratistas])->all(), 'idvehiculos', function($model){ return $model->patente;}),
                  'options' => ['placeholder' => 'Buscar Personas...'], 'pluginOptions'=>[
                'initialize' => true, 'multiple' => true,
                'required' => 'true'
            ]
              ])->label("Seleccionar Vehículos"); ?>
                </div>
            </div>



                <div class="col-md-12">
                    <div class="pdlf15">
                        <?= $form->errorSummary($model); ?>
                        <?= Html::submitButton('Guardar', ['class' => 'btn btn-info']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
