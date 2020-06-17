<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $searchModel app\models\LoanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'The Manage Page';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="main-manage">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="col-2">
        <?= Html::beginForm(['/loan/index'], 'post') ?>
        <?= Html::hiddenInput('onlyAdmin', 'sec1212Wr6') ?>
        <?= Html::submitButton('Show all loans', ['class' => 'btn btn-success search-button']); ?>
        <?= Html::endForm(); ?>
    </div>
</div>
