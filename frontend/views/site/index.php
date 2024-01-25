<?php

/** @var yii\web\View $this */

?>
<?= $this->render('partial/hero-normal') ?>
<?= $this->render('partial/category', ['categories' => $categories]) ?>
<?= $this->render('partial/feature', ['products' => $products, 'categories' => $categories]) ?>
<?= $this->render('partial/banner') ?>
<?= $this->render('partial/latest-product', ['latests' => $latests, 'reviews' => $reviews]) ?>
<?= $this->render('partial/blog') ?>
