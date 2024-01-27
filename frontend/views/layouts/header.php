<?php

use yii\helpers\Url;

?>
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> <?= $setting->email ?></li>
                            <li> <?= $setting->shipping_order ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="language.png" alt="">
                            <div><?= Yii::$app->language ?></div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="<?= Url::current(['lang' => 'uz']) ?>">O'zbekcha</a></li>
                                <li><a href="<?= Url::current(['lang' => 'en']) ?>">English</a></li>
                            </ul>

                        </div>
                        <div class="header__top__right__auth">
                            <a href="#"><i class="fa fa-user"></i> Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="<?= \yii\helpers\Url::to(['/']) ?>"><img src="<?= $setting->getUploadUrl('imageFile') ?>"
                                                                      alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li<?= Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index' ? ' class="active"' : '' ?>>
                            <a href="<?= \yii\helpers\Url::to(['index']) ?>"><?= Yii::t('app', 'Home') ?></a>
                        </li>
                        <li<?= Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'shop' ? ' class="active"' : '' ?>>
                            <a href="<?= \yii\helpers\Url::to(['site/shop']) ?>"><?= Yii::t('app', 'Shop') ?></a>
                        </li>
                        <li<?= Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'blog' ? ' class="active"' : '' ?>>
                            <a href="<?= \yii\helpers\Url::to(['site/blog']) ?>"><?= Yii::t('app', 'Blog') ?></a>
                        </li>
                        <li<?= Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'contact' ? ' class="active"' : '' ?>>
                            <a href="<?= \yii\helpers\Url::to(['site/contact']) ?>"><?= Yii::t('app', 'Contact') ?></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                    </ul>
                    <div class="header__cart__price">item: <span>$150.00</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>