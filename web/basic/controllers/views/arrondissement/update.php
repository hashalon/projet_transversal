<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Arrondissement */

$this->title = 'Update Arrondissement: ' . ' ' . $model->arr_code;
$this->params['breadcrumbs'][] = ['label' => 'Arrondissements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->arr_code, 'url' => ['view', 'id' => $model->arr_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="arrondissement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
