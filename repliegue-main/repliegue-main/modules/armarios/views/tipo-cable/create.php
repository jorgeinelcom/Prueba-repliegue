<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\armarios\models\ApRepliegue */

$this->title = 'Crear Tipo Material';
$this->params['breadcrumbs'][] = ['label' => 'Ap Repliegues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ap-repliegue-create">

    <h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <hr>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
