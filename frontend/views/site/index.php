<?php

/** @var yii\web\View $this */

?>
<?= $this->render('partial/hero-normal', ['banner' => $banner]) ?>
<?= $this->render('partial/category', ['categories' => $categories]) ?>
<?= $this->render('partial/feature', ['products' => $products, 'categories' => $categories]) ?>
<?= $this->render('partial/latest-product', ['latests' => $latests, 'reviews' => $reviews]) ?>
<?= $this->render('partial/blog', ['blogs' => $blogs]) ?>
