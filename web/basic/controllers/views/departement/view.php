<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Departement */

$this->title = $model->dep_no;
$this->params['breadcrumbs'][] = ['label' => 'Departements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departement-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->dep_no], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->dep_no], [
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
            'dep_no',
            'dep_name',
            'region_reg_no',
        ],
    ]) ?>

</div>
