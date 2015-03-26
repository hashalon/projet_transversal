<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Departement */

$this->title = 'Update Departement: ' . ' ' . $model->dep_no;
$this->params['breadcrumbs'][] = ['label' => 'Departements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dep_no, 'url' => ['view', 'id' => $model->dep_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="departement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
