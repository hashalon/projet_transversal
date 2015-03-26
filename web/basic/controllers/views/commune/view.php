<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Commune */

$this->title = $model->com_code;
$this->params['breadcrumbs'][] = ['label' => 'Communes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="commune-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->com_code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->com_code], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'com_code',
            'com_name',
            'epci',
            'arrondissement_arr_code',
            'zone_demploi_zone_no',
        ],
    ]) ?>

</div>
