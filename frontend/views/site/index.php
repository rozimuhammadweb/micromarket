<?php

/** @var yii\web\View $this */

use common\models\Category;
use common\models\Product;

$categories = Category::getCategories();
$products = Product::getProducts();
?>
<?= $this->render('partial/hero-normal') ?>
<?= $this->render('partial/category', ['categories' => $categories]) ?>
<?= $this->render('partial/feature', ['products' => $products]) ?>
<?= $this->render('partial/banner') ?>
<?= $this->render('partial/latest-product') ?>
<?= $this->render('partial/blog') ?>
