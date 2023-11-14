<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\modules\armarios\models\SaRegistroBodega */
/* @var $form yii\widgets\ActiveForm */

$today = date('d-m-Y');
?>

<div class="sa-registro-bodega-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-12">
    <div class="col-md-4">
   <?= $form->field($model, 'id_bodega')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(app\modules\armarios\models\SaBodegas::find()->all(), 'id_bodegas', function($model){ return $model->nombre;}),
                  'options' => ['placeholder' => 'Buscar Bodegas...']
              ])->label("Bodega"); ?>
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-4">
    <?= $form->field($model, 'id_repliegue')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(app\modules\armarios\models\ApRepliegue::find()->all(), 'id_repliegue', function($model){ return $model->descripcion;}),
                  'options' => ['placeholder' => 'Buscar Tipo...']
              ])->label("Tipo Material"); ?>
    </div>

    </div>

     <div class="col-md-12">

    <div class="col-md-4">
    <?= $form->field($model, 'id_pallet')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(app\modules\armarios\models\SaPallet::find()->all(), 'id_pallet', function($model){ return $model->nombre;}),
                  'options' => ['placeholder' => 'Buscar o ingresar Pallet...'],
                  'pluginOptions' => [
         
                     'tags' => true,
                     'maximumInputLength' => 80

                  ],
                  
              ])->label("N° Pallet / N° Fardo"); ?>
    </div>

    <div class="col-md-4">
    <?= $form->field($model, 'id_armario')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(app\modules\armarios\models\SaArmario::find()->all(), 'id_armario', function($model){ return $model->descripcion;}),
                  'options' => ['placeholder' => 'Buscar o ingresar Armario...'],
                  'pluginOptions' => [
         
                     'tags' => true,
                     'maximumInputLength' => 80

                  ],
                  
              ])->label("N° Armario / N° Matriz"); ?>
    </div>

    <div class="col-md-4">
        <div class="form-group label-floating">
            <label class="control-label">Fecha de Repliegue</label>
            <?= DatePicker::widget([
                'name' => 'fecha_repliegue',
                'id' => 'fecha_repliegue',
                'type' => DatePicker::TYPE_COMPONENT_APPEND  ,
                'value' => $today,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'dd-mm-yyyy'
                ]
            ]); ?>
        </div>
        </div>

</div>
 <div class="col-md-12">
  

        <div class="col-md-4">
            <?= $form->field($model, 'trozos')->textInput()->label("Q Trozos / Unid ") ?>        
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'peso_pallet')->textInput() ?>        
        </div>

         <div class="col-md-4">
    <?= $form->field($model, 'id_oc')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(app\modules\armarios\models\SaOc::find()->all(), 'id_oc', function($model){ return $model->nombre;}),
                  'options' => ['placeholder' => 'Buscar Oficina Central...'],
                  'pluginOptions' => [
          

                  ],
                  
              ])->label("Oficina Central"); ?>
    </div>
</div>

 <div class="col-md-12">
  

        <div class="col-md-4">
            <?= $form->field($model, 'id_autorizacion')->textInput()->label("Id Autorización ") ?>        
        </div>

        
    </div>
</div>
 
   <div class="col-md-12">
        <div class="col-md-4">
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <a href="index.php?r=armarios/registro-bodega" class="btn btn-default">Volver</a>
    </div>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
