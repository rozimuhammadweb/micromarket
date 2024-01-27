<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Tags $model */

$this->title = 'Update Tags: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tags-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
