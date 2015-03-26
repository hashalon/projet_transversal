<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Commune */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="commune-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'com_code')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'com_name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'epci')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'arrondissement_arr_code')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'zone_demploi_zone_no')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
