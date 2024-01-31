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
                            <?php foreach ($socials as $social): ?>
                                <a target="_blank" href="<?= $social->name ?>"><img style="width: 16px"
                                                                                    src="<?= $social->getUploadUrl('icon') ?>"></a>
                            <?php endforeach; ?>
                        </div>
                        <div class="header__top__right__language">
                            <div><?= Yii::$app->language ?></div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <?php if (Yii::$app->language !== 'uz'): ?>
                                    <li><a href="<?= Url::current(['lang' => 'uz']) ?>"><i class="fa fa-language"></i>
                                            Uzbekcha</a></li>
                                <?php endif; ?>

                                <?php if (Yii::$app->language !== 'en'): ?>
                                    <li><a href="<?= Url::current(['lang' => 'en']) ?>"><i class="fa fa-globe"></i>
                                            English</a></li>
                                <?php endif; ?>
                            </ul>


                        </div>
                        <div class="header__top__right__auth">
                            <a href="#"><i class="fa fa-user"></i> <?= Yii::t('app', 'login') ?></a>
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
                            <a href="<?= \yii\helpers\Url::to(['site/index']) ?>"><?= Yii::t('app', 'home') ?></a>
                        </li>
                        <li<?= Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'shop' ? ' class="active"' : '' ?>>
                            <a href="<?= \yii\helpers\Url::to(['shop/index']) ?>"><?= Yii::t('app', 'shop') ?></a>
                        </li>
                        <li<?= Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'blog' ? ' class="active"' : '' ?>>
                            <a href="<?= \yii\helpers\Url::to(['blog/index']) ?>"><?= Yii::t('app', 'blog') ?></a>
                        </li>
                        <li<?= Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'contact' ? ' class="active"' : '' ?>>
                            <a href="<?= \yii\helpers\Url::to(['site/contact']) ?>"><?= Yii::t('app', 'contact') ?></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><a href="<?= Url::to(['shop/shopping-card']) ?>"><i class="fa fa-shopping-bag"></i>
                                <span>3</span></a></li>
                    </ul>
                    <div class="header__cart__price"><?= Yii::t('app', 'item') ?>: <span>$150.00</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>