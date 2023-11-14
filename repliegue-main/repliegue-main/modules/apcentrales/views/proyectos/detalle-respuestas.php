<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
use app\modules\apcentrales\models\ApChecklistsRespuestas;
/* @var $this yii\web\View */
/* @var $model app\modules\apcentrales\models\ApProyectos */

$this->title = 'Resumen '.$checklist->descripcion.' '.$fechaChecklist;
$this->params['breadcrumbs'][] = ['label' => 'Ap Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
<div class="col-md-12">
    <div class="card">
        <h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <h5 style="font-weight: bold;">Proyecto: <?= $model->num_cubicacion ?></h5>
       <?php if($checklistid == 1){  ?>
        <a href="index.php?r=apcentrales/proyectos/update-checklist-diario&id=<?= $model->idproyectos?>&idChecklistDiario=<?= $idChecklist?>" class="btn btn-primary" style="float:right!important">Editar</a>
<?php }else if($checklistid == 2){ ?>
      <a href="index.php?r=apcentrales/proyectos/update-checklist-avance&id=<?= $model->idproyectos?>&idChecklistProyecto=<?= $idChecklist?>" class="btn btn-primary" style="float:right!important">Editar</a>
      <?php } ?>
      
        <hr>
        <div class="card-content">
            <div class="row">
 

             <?php foreach ($preguntas as $key => $p):
                $respuesta = ApChecklistsRespuestas::find()->where(["id_checklists_preguntas" => $p->id_checklists_preguntas, "id_checklists_proyectos" => $idChecklist])->one();

              ?>

                <div class="col-md-12">
                <div class="col-md-12">

                    <?php if ($p->id_tipos_preguntas == 1): ?>
                         <label class="control-label"> <b><?= $p->orden.'. '.$p->descripcion ?></b></label>
                         <?php if ($respuesta->respuesta == 0): ?>
                             <img src="images/nocheck.jpg" width="25px">
                         <?php else: ?>
                            <img src="images/check.png" width="25px">
                         <?php endif ?>
                       
  <br>
                     <?php elseif ($p->id_tipos_preguntas == 2): ?>
                         <label class="control-label"> <?= $p->orden.'. '.$p->descripcion ?></label> <br>
                        <p><?= $respuesta->respuesta; ?></p>

                         <?php elseif ($p->id_tipos_preguntas == 5): ?>
                         <label class="control-label"> <?= $p->orden.'. '.$p->descripcion ?></label> <br>
                        <p><?= $respuesta->respuesta; ?></p>
                      
                         <?php elseif ($p->id_tipos_preguntas == 3): ?>

                            <label class="control-label"> <b><?= $p->orden.'. '.$p->descripcion ?></b></label>
                         <?php if ($respuesta->respuesta == 0): ?>
                             <img src="images/nocheck.jpg" width="25px">
                         <?php else: ?>
                            <img src="images/check.png" width="25px">
                         <?php endif ?>
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

                              <label class="control-label"> <b><?= $p->orden.'. '.$p->descripcion ?></b></label>
                         <?php if ($respuesta->respuesta == 0): ?>
                             <img src="images/nocheck.jpg" width="25px">
                         <?php else: ?>
                            <img src="images/check.png" width="25px">
                         <?php endif ?>
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
                  <br>
                </div>
            </div>


                 
             <?php endforeach ?>

            
 
             <?php if ($checklistid == 1): ?>
                 
            <div class="col-md-12">
                <div class="col-md-12">
                    <label class="control-label"> <b>Imágenes</b></label>
                    <br><br>

                    <div class="card-content">
                   <?php foreach ($archivos as $img): ?>
                      <a href="<?= $img->url ?>" download target="_blank"> <img src="<?= $img->url ?>" width="40%"></a>
                       <hr>
                   <?php endforeach ?>
                   </div>
                </div>
            </div>


             <?php endif ?>

                <div class="col-md-12">
                    <div class="pdlf15">
             
                        <a href="index.php?r=apcentrales/proyectos" class="btn btn-default">Volver</a>
                    </div>
                </div>

      
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