<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\armarios\models\ApRepliegue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ap-repliegue-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <a href="index.php?r=armarios/tipo-cable/index" class="btn btn-default"> Volver</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
