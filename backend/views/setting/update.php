<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Setting $model */

$this->title = 'Update Setting: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="setting-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
