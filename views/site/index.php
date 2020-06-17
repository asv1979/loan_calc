<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoginForm */
/* @var $items array */

$this->title = 'The loan creator';

?>
<div class="site-index">
    <div class="body-content">

        <div class="row get-loan">
            <div class="col-lg-6 col-lg-offset-3">
                <h2>Create your loan</h2>
                <div class="brand-form">

                    <?php $form = ActiveForm::begin(); ?>

                    <div class="box box-default">
                        <div class="box-body">
                            <?= $form->field($model, 'start_date')->widget(DatePicker::class, [
                                'options' => ['placeholder' => 'Select issue date from tomorrow...'],
                                'pluginOptions' => [
                                    'autoclose' => true,
                                    'format' => 'dd-mm-yyyy',
                                    'startDate' => date('d-m-yy', strtotime('+1 day'))
                                ]

                            ]) ?>
                            <?= $form->field($model, 'sum')->input('number') ?>
                            <?= $form->field($model, 'month_term')->dropDownList($items); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= Html::submitButton('Get the loan', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>

            </div>
        </div>

    </div>
</div>
