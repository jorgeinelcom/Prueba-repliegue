<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\armarios\models\SaOc */

$this->title = 'Crear Oficina Central';
$this->params['breadcrumbs'][] = ['label' => 'Sa Ocs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sa-oc-create">

    <h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <hr>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
