<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\apcentrales\models\ApPersonas */

$this->title = 'Crear Persona';
$this->params['breadcrumbs'][] = ['label' => 'Ap Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">
    <div class="card">
        <h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <hr>
        <div class="card-content">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
