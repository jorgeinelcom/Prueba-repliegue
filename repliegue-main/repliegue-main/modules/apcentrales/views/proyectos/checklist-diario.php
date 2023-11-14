<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;use kartik\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model app\modules\apcentrales\models\ApProyectos */

$this->title = 'Checklist Diario';
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

                    <?php if ($p->id_tipos_preguntas == 1): ?>
                        <p>
                            <div class="pretty p-switch p-fill">
                            <input type="checkbox" name="respuesta-<?= $p->id_checklists_preguntas; ?>"  value="" />
                                <div class="state p-primary ">
                                    <label class="control-label"> <b><?= $p->orden.'. '.$p->descripcion ?></b></label>
                                </div>
                            </div>
                        </p>

                     <?php elseif ($p->id_tipos_preguntas == 2): ?>
                         <label class="control-label"><b> <?= $p->orden.'. '.$p->descripcion ?></b></label> <br>
                         <input class="form-control" type="text" name="respuesta-<?= $p->id_checklists_preguntas; ?>">
                      
                         <?php elseif ($p->id_tipos_preguntas == 3): ?>

                            <p>
                        <div class="pretty p-switch p-fill">
                            <input type="checkbox" name="respuesta-<?= $p->id_checklists_preguntas; ?>"  value="" />
                            <div class="state p-primary ">
                                <label class="control-label"> <b><?= $p->orden; ?>. Personal Ok</b></label>
                            </div>
                        </div>
                    </p>
                    <table class="table">
                        <th>Nombre</th>
                        <tbody>
                            <?php foreach ($personasProyecto as $key => $pp): ?>
                                <tr>
                                    <td><?= $pp->idpersonas0->nombre.' '.$pp->idpersonas0->apellido; ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                             <?php elseif ($p->id_tipos_preguntas == 4): ?>

                                <p>
                        <div class="pretty p-switch p-fill">
                            <input type="checkbox" name="respuesta-<?= $p->id_checklists_preguntas; ?>"  value="" />
                            <div class="state p-primary ">
                                <label class="control-label">   <b> <?= $p->orden; ?>. Vehículos</b></label>
                            </div>
                        </div>
                    </p>
                    <table class="table">
                        <th>Patente</th>
                        <tbody>
                            <?php foreach ($vehiculosProyecto as $key => $vp): ?>
                                <tr>
                                    <td><?= $vp->idvehiculos0->patente; ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?php endif ?>
               
                </div>
            </div>


                 
             <?php endforeach ?>

            
 

            <div class="col-md-12">
                <div class="col-md-12">
                     <?= $form->field($archivos, 'imageFiles[]')->widget(FileInput::classname(), [
                    'options' => ['multiple' => true, 'accept' => 'image/*;capture=camera',],
                    'pluginOptions' => [
                      'showRemove' => false,
                      'showUpload' => TRUE,
                      // 'uploadUrl' =>'index.php?r=dataCollector/data-collector/save-docs',
                      // 'uploadExtraData' => [
                      //     'album_id' => 20,
                      //     'cat_id' => 'Nature'
                      // ],

                    ]
                ])->label("Imágenes");

                ?>
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