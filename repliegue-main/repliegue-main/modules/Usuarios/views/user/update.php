<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\Usuarios\models\CoreUsuario */

$this->title = 'Actualizar Usuario: ' . $model->nombre.' '. $model->apellidos;
$model->password = '';
?>
<div class="card">

    <div class="col-md-10">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>

    <div class="col-md-2">
        <p>
            <?= Html::a('<i class="fas fa-arrow-left"></i> Volver', ['index'], ['class' => 'btn btn-default  btn-top fr']) ?>
        </p>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
