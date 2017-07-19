<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Packages;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Schedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schedule-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'packages_package_id')->dropDownList(
    ArrayHelper::map(Packages::find()->all(),'package_id','package_name'),['prompt'=>'Select Package']
    ) ?>
    <?= $form->field($model, 'day')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
