<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\Usuarios\models\Cargo */

$this->title = 'Añadir Cargo';

?>
<div class="card">

    <div class="col-md-10">
      <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-md-2">
      <?= Html::a('<i class="fas fa-arrow-left"></i> Volver', ['index'], ['class' => 'btn btn-default fr btn-top']) ?>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <div class="clearfix"></div>

</div>
