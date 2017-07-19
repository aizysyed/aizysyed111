<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PackagesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="packages-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'package_id') ?>

    <?= $form->field($model, 'package_name') ?>

    <?= $form->field($model, 'package_days') ?>

    <?= $form->field($model, 'places_place_id') ?>

    <?= $form->field($model, 'package_total_amount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
