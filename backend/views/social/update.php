<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Social $model */

$this->title = 'Update Social: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="social-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
