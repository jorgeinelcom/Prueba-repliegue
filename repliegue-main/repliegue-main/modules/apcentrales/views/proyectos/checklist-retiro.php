<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;use kartik\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model app\modules\apcentrales\models\ApProyectos */

$this->title = 'Avance Retiro';
$this->params['breadcrumbs'][] = ['label' => 'Ap Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
<div class="col-md-12">
    <div class="card">
        <h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <hr>
        <div class="card-content">
            <div class="row">
             <?php $form = ActiveForm::begin(); ?>

             <?php foreach ($preguntas as $key => $p): ?>

                <div class="col-md-12">
                <div class="col-md-12">

                
                     <?php if ($p->id_tipos_preguntas == 5): ?>
                         <label class="control-label"><b> <?= $p->orden.'. '.$p->descripcion ?></b></label> <br>
                         <input class="form-control" type="number" name="respuesta-<?= $p->id_checklists_preguntas; ?>" required>
                      <br>

                       <?php elseif ($p->id_tipos_preguntas == 2): ?>
                         <label class="control-label"><b> <?= $p->orden.'. '.$p->descripcion ?></b></label> <br>
                         <input class="form-control" type="text" name="respuesta-<?= $p->id_checklists_preguntas; ?>">
                      <br>
                        
                    <?php endif ?>
               
                </div>
            </div>


                 
             <?php endforeach ?>

            
 
 


                <div class="col-md-12">
                    <div class="pdlf15">
                        <?= $form->errorSummary($model); ?>
                        <?= Html::submitButton('Guardar', ['class' => 'btn btn-info']) ?>
                        <a href="index.php?r=apcentrales/proyectos" class="btn btn-default">Volver</a>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>


<style type="text/css">
    .checkbox label, .radio label, label, .label-on-left, .label-on-right {
    
    line-height: 1;
      }

.pretty.p-switch .state label {
 
    color: #555555;
}
</style>