<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\modules\armarios\models\SaOc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sa-oc-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_agencia')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(app\modules\armarios\models\SaAgencia::find()->all(), 'id_agencia', function($model){ return $model->nombre;}),
                  'options' => ['placeholder' => 'Buscar Agencia...'],
                  'pluginOptions' => [

                  ],
                  
              ])->label("Agencia"); ?>

      <?= $form->field($model, 'id_comuna')->widget(Select2::classname(), [
                  'data' => ArrayHelper::map(app\modules\armarios\models\SaComuna::find()->all(), 'id_comuna', function($model){ return $model->nombre;}),
                  'options' => ['placeholder' => 'Buscar Comuna...'],
                  'pluginOptions' => [

                  ],
                  
              ])->label("Comuna"); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'omonimo')->textInput(['maxlength' => true]) ?>
 

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <a href="index.php?r=armarios/oficina-central/index" class="btn btn-default"> Volver</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
