<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Tags $model */

$this->title = 'Create Tags';
$this->params['breadcrumbs'][] = ['label' => 'Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tags-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
