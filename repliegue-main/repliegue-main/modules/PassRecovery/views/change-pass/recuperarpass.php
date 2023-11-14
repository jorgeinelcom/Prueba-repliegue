<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
 ?>

<div class="col-md-6 col-md-offset-3">

  <div class="card" id="p15">

    <div class="co-md-10 ">
      <h3> Hola <strong> <?= Yii::$app->session['nombre']; ?></strong> <br> <small> Asegurate de que elegir una contraseña que  sea segura y no la compartas con nadie</small> </h3>

      <?php $form = ActiveForm::begin(['action' => ['save-new-pass']]) ?>
      <div class="col-md-12">
        <?= $form->field($usuario, 'password')->passwordInput() ?>
      </div>
      <div class="col-md-12">
        <?= $form->field($usuario, 'password_repeat')->passwordInput() ?>
      </div>

        <?= $form->field($usuario, 'rut_usuario')->hiddenInput()->label(false) ?>

      <div class="col-md-12 text-center">
        <input type="submit" name="" value="Cambiar Contraseña " class="btn btn-success">
      </div>
      <?php ActiveForm::end(); ?>
      <div class="clearfix"></div>
    </div>


  </div>



</div>


<style media="screen">
#p15{
  padding:15px!important;
}
  ul{
    display: none!important;
  }

  body {
    background: rgb(15,78,102);
    background: linear-gradient(45deg, rgba(15,78,102,1) 0%, rgba(0,191,215,1) 100%);
  }

  .wrap > .container {
    padding: 70px 15px 20px;
}
</style>
