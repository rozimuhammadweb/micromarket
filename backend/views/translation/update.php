<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Translation $model */

$this->title = 'Update Translation: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Translations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="translation-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
