<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\armarios\models\SaBodegas */

$this->title = 'Create Sa Bodegas';
$this->params['breadcrumbs'][] = ['label' => 'Sa Bodegas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sa-bodegas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
