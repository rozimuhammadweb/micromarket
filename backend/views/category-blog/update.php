<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CategoryBlog $model */

$this->title = 'Update Category Blog: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Category Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-blog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
