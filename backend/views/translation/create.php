<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Translation $model */

$this->title = 'Create Translation';
$this->params['breadcrumbs'][] = ['label' => 'Translations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="translation-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
