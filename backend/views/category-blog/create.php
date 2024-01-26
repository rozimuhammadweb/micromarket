<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CategoryBlog $model */

$this->title = 'Create Category Blog';
$this->params['breadcrumbs'][] = ['label' => 'Category Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-blog-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
