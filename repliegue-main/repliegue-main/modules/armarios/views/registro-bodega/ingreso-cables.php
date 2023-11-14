<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use app\modules\armarios\models\SaTipoCableRegistro;
/* @var $this yii\web\View */
/* @var $model app\modules\armarios\models\SaRegistroBodega */

$this->title = $model->pallet->nombre.' - '.$model->armario->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Sa Registro Bodegas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
 
<div class="sa-registro-bodega-view">

<?php $form = ActiveForm::begin(); ?>
    <div class="col-md-12">
<div class="card">
        <div class="row">
             <div class="col-md-12">
  <h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <hr>

   <table class="table">
    <thead>
       <th>Tipo Cable</th>
       <th>Peso</th>
       </thead>
       <tbody>
           <?php foreach ($tipoCables as $key => $tc):
            $tipoRegistro = SaTipoCableRegistro::find()->where(["id_tipo_cable" => $tc->id_tipo_cable, "id_registro_bodega" => $id])->one();
            if ($tipoRegistro) {
                $value = $tipoRegistro->peso;
            }else{
                $value = 0;
            }
            ?>
               <tr>
                   <td><?= $tc->nombre; ?></td>
                   <td><input   type="number" name="peso-<?= $tc->id_tipo_cable ?>" step="0.01" min="0" value="<?= $value ?>" required="true"></td>
               </tr>
           <?php endforeach ?>
       </tbody>
   </table>
</div>
 <div class="col-md-12">
     
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <a href="index.php?r=armarios/registro-bodega" class="btn btn-default">Volver</a>
 
    </div>
</div>
</div>
    <?php ActiveForm::end(); ?>
</div></div>
</div>

<style type="text/css">
    table {
    display: table;
    border-collapse: separate;
    box-sizing: border-box;
    text-indent: initial;
    border-spacing: 2px;
    border-color: transparent;
}
thead {
    background: #0aa5b9;
    color: white;
}
input[type="number"] {
    border: 1px solid #a5bac6;
    border-radius: 10px;
    padding-left: 10px;
    padding-right: 10px;
}
</style>