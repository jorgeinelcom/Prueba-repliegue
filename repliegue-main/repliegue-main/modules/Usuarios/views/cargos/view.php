<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\Usuarios\models\Cargo */

$this->title = $model->nombre;

\yii\web\YiiAsset::register($this);
?>
<div class="card">

    <div class="col-md-8">
      <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-md-4">

      <p>
        <?= Html::a('<i class="fas fa-trash"></i> Delete', ['delete', 'id' => $model->id_cargo], [
          'class' => 'btn btn-danger fr btn-top',
          'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
          ],
          ]) ?>
          <?= Html::a('<i class="fas fa-pencil-alt"></i> Update', ['update', 'id' => $model->id_cargo], ['class' => 'btn btn-primary fr btn-top']) ?>
          <?= Html::a('<i class="fas fa-arrow-left"></i> Volver', ['index'], ['class' => 'btn btn-default fr btn-top']) ?>
        </p>
    </div>

    <div class="col-md-12">
      <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          'id_cargo',
          'nombre',
          'descripcion',
          'created_at'
        ],
        ]) ?>
      </div>




<div class="clearfix"></div>
</div>

<style media="screen">
  .btn{
    margin:0px 5px;
  }
</style>
