<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Arrondissement */

$this->title = 'Create Arrondissement';
$this->params['breadcrumbs'][] = ['label' => 'Arrondissements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arrondissement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
