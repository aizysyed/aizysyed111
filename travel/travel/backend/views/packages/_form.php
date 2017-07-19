<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Places;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Packages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="packages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'package_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'package_days')->textInput() ?>
    <?= $form->field($model, 'places_place_id')->dropDownList(
    ArrayHelper::map(Places::find()->all(),'place_id','place_name'),['prompt'=>'Select Place']
    ) ?>
    

    <?= $form->field($model, 'package_total_amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
