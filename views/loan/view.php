<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Loan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Loans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="loan-view">

    <h1><?= Html::encode('The loan choice is : ') ?></h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'start_date',
            'sum',
            'month_term',
            'year_percent',
        ],
    ]) ?>
</div>
