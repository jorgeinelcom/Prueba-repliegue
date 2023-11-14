<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\Permisos\models\PermisosUsuarios */

$this->title = 'Añadir Permiso';

?>
<div class="card">

  <div class="col-md-10">
    <h1><?= Html::encode($this->title) ?></h1>
  </div>

  <div class="col-md-2">
    <a href="index.php?r=Permisos" class="btn btn-default btn-top fr"> <i class="fas fa-arrow-left"></i> Volver</a>
  </div>

    <?= $this->render('_form', [
      'model' => $model,
      ]) ?>


  <div class="clearfix"></div>

</div>
