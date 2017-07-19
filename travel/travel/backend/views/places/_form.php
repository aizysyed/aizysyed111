<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Places */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="places-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'place_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'place_city_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
