<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Commune */

$this->title = 'Update Commune: ' . ' ' . $model->com_code;
$this->params['breadcrumbs'][] = ['label' => 'Communes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->com_code, 'url' => ['view', 'id' => $model->com_code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="commune-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
