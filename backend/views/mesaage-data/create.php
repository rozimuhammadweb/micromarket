<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\MessageData $model */

$this->title = 'Create Message Data';
$this->params['breadcrumbs'][] = ['label' => 'Message Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
