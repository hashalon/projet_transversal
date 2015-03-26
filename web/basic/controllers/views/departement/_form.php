<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Departement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dep_no')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'dep_name')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'region_reg_no')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
