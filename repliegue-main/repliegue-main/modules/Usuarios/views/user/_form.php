<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\modules\Usuarios\models\Cargo;
use app\modules\Usuarios\models\proyecto;
use app\modules\Usuarios\models\EstadoUsuarios;


?>

<div class="row">

    <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off']]); ?>

    <div class="col-md-12">

        <div class="col-sm-3 col-md-3">
            <?= $form->field($model, 'rut_usuario')->textInput() ?>
        </div>
    
        <div class="col-sm-2 col-md-1">
            <?= $form->field($model, 'dv')->textInput(['maxlength' => true]) ?>
        </div>
    
        <div class="col-md-4">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        </div>
    
        <div class="col-md-4">
            <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>
        </div>

    </div>


    <div class="col-md-12">

        <div class="col-md-3">
            <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>
        </div>
    
       
        <div class="col-md-3">
            <?= $form->field($model, 'id_cargo')->widget(Select2::classname(),[
                'data' => ArrayHelper::map(Cargo::find()->all(), 'id_cargo', 'nombre'),
                'options' => ['placeholder' => 'Seleccione un Cargo'],
                'pluginOptions' => [
                    'allowClear' => true
                  ],
            ]); ?>
        </div>
    
        <div class="col-md-3">
            <?= $form->field($model, 'id_proyecto')->widget(Select2::classname(),[
                'data' => ArrayHelper::map(Proyecto::find()->all(), 'id_proyecto', 'nombre'),
                'options' => ['placeholder' => 'Seleccione un Proyecto'],
                'pluginOptions' => [
                    'allowClear' => true
                  ],
            ]); ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'id_estado')->widget(Select2::classname(),[
                'data' => ArrayHelper::map(EstadoUsuarios::find()->all(), 'id_estado', 'nombre'),
                'options' => ['placeholder' => 'Seleccione el estado del usuario'],
                'pluginOptions' => [
                    'allowClear' => true
                  ],
            ]); ?>
        </div>
            
    
    </div>
    
    
    <div class="col-md-12">

    
        <div class="col-md-3">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true,'autocomplete' =>'off' ]) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
        </div>
    
        <div class="col-md-3">
            <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>
        </div>
    
        <div class="col-sm-12 col-md-3">
            <?= Html::submitButton('Guardar <i class="fas fa-save"></i>', ['class' => 'btn btn-success btn-block btn-top',
            
            'data' => [
                'confirm' => '¿Deseas guardar los datos ingresados en el formulario?',
                'method' => 'post',
            ], 
            ]) ?>
        </div>
    </div>





    

    <?php ActiveForm::end(); ?>

</div>
