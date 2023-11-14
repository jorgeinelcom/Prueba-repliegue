<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

use app\modules\Permisos\models\CoreUsuario;
use app\modules\Permisos\models\Permisos;
?>

<div class="permisos-usuarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-4">
      <?= $form->field($model, 'id_permiso')->widget(Select2::classname(),[
          'data' => ArrayHelper::map(Permisos::find()->all(), 'id_permiso', 'nombre'),
          'options' => ['placeholder' => 'Seleccione un permiso'],
          'pluginOptions' => [
              'allowClear' => true
            ],
        ]) ?>
    </div>

    <div class="col-md-4">
      <?= $form->field($model, 'rut_usuario')->widget(Select2::classname(),[
          'data' => ArrayHelper::map(CoreUsuario::find()->all(), 'rut_usuario','fullName'),
          'options' => ['placeholder' => 'Seleccione un Usuario'],
          'pluginOptions' => [
              'allowClear' => true
            ],
        ]) ?>
    </div>

    <div class="col-md-4">
      <?= Html::submitButton('Guardar <i class="fas fa-save"></i>', ['class' => 'btn btn-success btn-block btn-top']) ?>

    </div>


    <?php ActiveForm::end(); ?>

</div>
