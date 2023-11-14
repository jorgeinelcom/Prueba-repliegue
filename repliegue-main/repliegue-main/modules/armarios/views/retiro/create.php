<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\armarios\models\SaRetiro */

$this->title = 'Generar Retiro';
$this->params['breadcrumbs'][] = ['label' => 'Sa Retiros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sa-retiro-create">
  <div class="col-md-12">
<div class="col-md-12">
<h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <hr>
    </div>
        </div>
    <?= $this->render('_form', [
        'model' => $model,
        'registro' => $registro
    ]) ?>

</div>
