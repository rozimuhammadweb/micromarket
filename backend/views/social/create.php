<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Social $model */

$this->title = 'Create Social';
$this->params['breadcrumbs'][] = ['label' => 'Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
