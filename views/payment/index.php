<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $loan_id string */

$this->title = 'Payments schedule';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="payment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'date',
            'whole_sum',
            'body_sum',
            'percent_sum',
            'balance_owed'
        ],
    ]); ?>

    <?= Html::a('Get my loan choice', ["/loan/view/" . $loan_id], ['class' => 'big-button']) ?>
</div>
