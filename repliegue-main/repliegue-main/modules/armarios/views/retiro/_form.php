<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\modules\armarios\models\SaRetiro */
/* @var $form yii\widgets\ActiveForm */
$today = date('d-m-Y');
?>

<div class="sa-retiro-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-12">
        <div class="col-md-6">
 
            <table class="table">
                <tbody>
                    <tr>
                         <th>Bodega</th>
                         <td><?= $registro->bodega->nombre ?></td>
                    </tr>
                    <tr>
                         <th>ID</th>
                         <td><?= $registro->id ?></td>
                    </tr>
                    <tr>
                         <th>Repliegue</th>
                         <td><?= $registro->repliegue->descripcion ?></td>
                    </tr>
                    <tr>
                         <th>N° Pallet / N° Fardo</th>
                         <td><?= $registro->pallet->nombre; ?></td>
                    </tr>
                    <tr>
                         <th>N° Armario / N° Matriz</th>
                         <td><?= $registro->armario->descripcion ?></td>
                    </tr>
                </tbody>   
            </table>
        </div>
        <div class="col-md-6">
            <table class="table">
                <tbody>
                    <tr>
                         <th>Fecha Repliegue</th>
                         <td><?= date('d-m-Y', strtotime($registro->fecha_repliegue)) ?></td>
                    </tr>
                    <tr>
                         <th>Kilos Cu</th>
                         <td><?= $registro->kilos_cu ?></td>
                    </tr>
                    <tr>
                         <th>Q Trozos / Unid</th>
                         <td><?= $registro->trozos ?></td>
                    </tr>
                    <tr>
                         <th>Peso Pallet</th>
                         <td><?= $registro->peso_pallet ?></td>
                    </tr>
                </tbody>   
            </table>
        </div>
    </div>

    <div class="col-md-12">
        
        <div class="col-md-4">
            
        <?= $form->field($model, 'lote')->textInput(["required" => true]) ?>

        </div>

        <div class="col-md-4">
            
        <?= $form->field($model, 'retiro')->textInput(["required" => true]) ?>

        </div>

        <div class="col-md-4">
            
       <?= $form->field($model, 'guia_despacho')->textInput(["required" => true]) ?>

        </div>


    </div>

        <div class="col-md-12">
        
        <div class="col-md-4">
             <div class="form-group label-floating">
            <label class="control-label">Fecha de Entrega</label>
            <?= DatePicker::widget([
                'name' => 'fecha_entrega',
                'id' => 'fecha_entrega',
                'type' => DatePicker::TYPE_COMPONENT_APPEND  ,
                'value' => $today,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'dd-mm-yyyy',
                    'required' => true
                ]
            ]); ?>
        </div>
      

        </div>

        <div class="col-md-4">
            
          <?= $form->field($model, 'peso_total_telefonica')->textInput(['type' => 'number', 'step' => '0.01', 'required' => true]) ?>

        </div>

        <div class="col-md-4">
            
        <?= $form->field($model, 'destino_entrega')->textInput(['maxlength' => true, 'required' => true]) ?>

        </div>


    </div>

    

     <div class="col-md-12">
        
        <div class="col-md-4">
            
         <?= $form->field($model, 'acta_servicio')->textInput() ?>

        </div>

        <div class="col-md-4">

               <div class="form-group label-floating">
            <label class="control-label">Fecha Acta</label>
            <?= DatePicker::widget([
                'name' => 'fecha_acta',
                'id' => 'fecha_acta',
                'type' => DatePicker::TYPE_COMPONENT_APPEND  ,
                'value' => $today,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'dd-mm-yyyy'
                ]
            ]); ?>
        </div>

            

        </div>

        <div class="col-md-4">
            <?= $form->field($registro, 'id_estado')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(app\modules\armarios\models\SaEstadoRetiro::find()->all(), 'id_estado_retiro', function($model){ return $model->descripcion;}),
                  'options' => ['placeholder' => 'Buscar Estado...'],
                  'pluginOptions' => [

                  ],
                  
              ])->label("Estado"); ?>
 

        </div>


    </div>

<div class="col-md-12">

    <div class="col-md-12">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <a href="index.php?r=armarios/registro-bodega/index" class="btn btn-default">Volver</a>
    </div>    </div>

    <?php ActiveForm::end(); ?>

</div>


<style type="text/css">
    table.table {
    background-color: white;
}
</style>