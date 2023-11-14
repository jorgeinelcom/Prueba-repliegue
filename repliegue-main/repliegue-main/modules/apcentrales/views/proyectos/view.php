<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\apcentrales\models\ApChecklistsRespuestas;
/* @var $this yii\web\View */
/* @var $model app\modules\apcentrales\models\ApProyectos */

$this->title = $model->num_cubicacion;
$this->params['breadcrumbs'][] = ['label' => 'Ap Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ap-proyectos-view">

<h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <hr>
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idproyectos], ['class' => 'btn btn-primary']) ?>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idproyectos',
            'num_cubicacion',
            'oc',
            'fec_asignacion',
            'mts_proyectados_cable',
            'kg_proyectados_cable',
            'mts_reales',
            'kg_reales',
            //'create_at',
            'repliegue.descripcion',
            'subcontratistas.nombre',
            'estadosProyecto.nombre',
        ],
    ]) ?>

<h4 style="font-weight: bold;">Checklist Diario</h4>
        <hr>
    <table class="table">
        <th>Fecha</th>
        <th>Usuario</th>
        <th></th>
        <tbody>
            <?php foreach ($checklists as $key => $check) { ?>
               <tr>
                <td><?= date('d-m-Y', strtotime($check->create_at )); ?> </td>
                <td><?= $check->rutUsuario->nombre.' '.$check->rutUsuario->apellidos ?></td>
                <td> </td>
               </tr>
                <?php } ?>
        </tbody>
    </table>


    <h4 style="font-weight: bold;">Avance Diario</h4>
        <hr>

    <table class="table">
        <th>Fecha</th>
        <th>Usuario</th>
        <th>Kg Retirados</th>
        <th>Mts Retirados</th>
        <th>Comentario</th>
        <tbody>
            <?php foreach ($avance as $key => $av) { 
                $respuestaKg = ApChecklistsRespuestas::find()->where(["id_checklists_proyectos" => $av->id_checklists_proyectos, "id_checklists_preguntas" => 9])->one();
                $respuestaMts = ApChecklistsRespuestas::find()->where(["id_checklists_proyectos" => $av->id_checklists_proyectos, "id_checklists_preguntas" => 10])->one();
                $respuestaComentario = ApChecklistsRespuestas::find()->where(["id_checklists_proyectos" => $av->id_checklists_proyectos, "id_checklists_preguntas" => 11])->one();
                ?>
               <tr>
                <td> <?= date('d-m-Y', strtotime($av->create_at )); ?> </td>
                <td><?= $av->rutUsuario->nombre.' '.$av->rutUsuario->apellidos ?></td>
                <td><?= $respuestaKg->respuesta ?></td>
                <td><?= $respuestaMts->respuesta ?></td>
                <td><?= $respuestaComentario->respuesta ?></td>
               </tr>
                <?php } ?>
        </tbody>
    </table>

    <h4 style="font-weight: bold;">Cambios de Estado</h4>
        <hr>

        <table class="table">
                <th>Estado</th>
                <th>Fecha</th>
                <th>Usuario</th>
                <tbody>
                <?php foreach ($cambiosEstado as $key => $ce) { 
                
                ?>
               <tr>
                <td><?= $ce->estadosProyecto->nombre ?></td>
                <td> <?= date('d-m-Y', strtotime($ce->create_at )); ?> </td>
                <td><?= $ce->rutUsuario0->nombre.' '.$ce->rutUsuario0->apellidos ?></td>
               </tr>
                <?php } ?>
                </tbody>
        </table>

    <a href="index.php?r=apcentrales/proyectos" class="btn btn-default">Volver</a>

</div>
