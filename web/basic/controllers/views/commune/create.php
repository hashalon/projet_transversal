<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Commune */

$this->title = 'Create Commune';
$this->params['breadcrumbs'][] = ['label' => 'Communes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="commune-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
