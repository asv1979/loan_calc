<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LoanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'start_date',
            'sum',
            'month_term',
            'year_percent',
            [
                'class' => 'kartik\grid\ActionColumn',
                'urlCreator' => function($action, $model, $key, $index) {
                    return "payment/".$key;
                },
                'viewOptions' => ['title' => 'Show schedule','href'=>'payment'],
                'updateOptions' => ['icon'=>false,'label'=>false],
                'deleteOptions' => ['icon'=>false,'label'=>false]

            ],

        ],
    ]); ?>
</div>
