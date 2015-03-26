<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Arrondissement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arrondissement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'arr_code')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'arr_name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'departement_dep_no')->textInput(['maxlength' => 50]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
