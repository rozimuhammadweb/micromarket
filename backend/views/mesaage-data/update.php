<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\MessageData $model */

$this->title = 'Update Message Data: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Message Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="message-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
