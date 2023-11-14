<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\Permisos\models\PermisosUsuarios */

$this->title = 'Actualizar Permiso: ' . $model->permiso->nombre. " - ".$model->rutUsuario->fullName;

?>
<div class="card">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


<div class="clearfix"></div>
</div>
