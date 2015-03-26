<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Arrondissement */

$this->title = $model->arr_code;
$this->params['breadcrumbs'][] = ['label' => 'Arrondissements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arrondissement-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->arr_code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->arr_code], [
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
            'arr_code',
            'arr_name',
            'departement_dep_no',
        ],
    ]) ?>

</div>
