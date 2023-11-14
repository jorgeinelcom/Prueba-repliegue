<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\apcentrales\models\ApSubcontratistas */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Ap Subcontratistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ap-subcontratistas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_subcontratistas], ['class' => 'btn btn-primary']) ?>
 
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_subcontratistas',
            'nombre',
            'create_at',
            'precio_aereo',
            'precio_matriz',
        ],
    ]) ?>

    <a href="index.php?r=apcentrales/subcontratistas" class="btn btn-default">Volver</a>

</div>
