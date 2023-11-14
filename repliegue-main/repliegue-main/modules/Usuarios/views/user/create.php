<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\Usuarios\models\CoreUsuario */

$this->title = 'Crear Usuario';

?>
<div class="card">

    <div class="col-md-10">
        <h1><?= Html::encode($this->title) ?></h1>
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
