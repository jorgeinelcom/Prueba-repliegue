<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\armarios\models\ApRepliegue */

$this->title = 'Update Ap Repliegue: ' . $model->id_repliegue;
$this->params['breadcrumbs'][] = ['label' => 'Ap Repliegues', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_repliegue, 'url' => ['view', 'id' => $model->id_repliegue]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ap-repliegue-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
