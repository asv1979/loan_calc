<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Loan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'start_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sum')->textInput() ?>

    <?= $form->field($model, 'month_term')->textInput() ?>

    <?= $form->field($model, 'year_percent')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
