<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Places */

$this->title = 'Update Places: ' . $model->place_id;
$this->params['breadcrumbs'][] = ['label' => 'Places', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->place_id, 'url' => ['view', 'id' => $model->place_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="places-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
