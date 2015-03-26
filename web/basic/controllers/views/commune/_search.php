<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CommuneSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="commune-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'com_code') ?>

    <?= $form->field($model, 'com_name') ?>

    <?= $form->field($model, 'epci') ?>

    <?= $form->field($model, 'arrondissement_arr_code') ?>

    <?= $form->field($model, 'zone_demploi_zone_no') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
