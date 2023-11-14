<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\apcentrales\models\ApVehiculos */

$this->title = $model->patente;
$this->params['breadcrumbs'][] = ['label' => 'Ap Vehiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ap-vehiculos-view">

<h4 style="font-weight: bold;"><?= Html::encode($this->title) ?></h4>
        <hr>
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idvehiculos], ['class' => 'btn btn-info']) ?>
      
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idvehiculos',
            'patente',
            'marca',
            'modelo',
            'color',
            'anio',
            'create_at',
        ],
    ]) ?>

    <a href="index.php?r=apcentrales/vehiculos" class="btn btn-default">Volver</a>

</div>
