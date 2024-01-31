<?php

use yii\helpers\Url;

?>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="<?= $setting->getUploadUrl('imageFile') ?>" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="<?= Url::to(['shop/checkout']) ?>"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price"><?= Yii::t('app', 'item') ?>: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <div><?= Yii::$app->language ?></div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <?php

                if (Yii::$app->language !== 'uz'): ?>
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
            <a href="#"><i class="fa fa-user"></i> <?= Yii::t('app','login')?></a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <
            <ul>
                <li<?= Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index' ? ' class="active"' : '' ?>>
                    <a href="<?= \yii\helpers\Url::to(['site/index']) ?>"><?= Yii::t('app', 'Home') ?></a>
                </li>
                <li<?= Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'shop' ? ' class="active"' : '' ?>>
                    <a href="<?= \yii\helpers\Url::to(['shop/index']) ?>"><?= Yii::t('app', 'Shop') ?></a>
                </li>
                <li<?= Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'blog' ? ' class="active"' : '' ?>>
                    <a href="<?= \yii\helpers\Url::to(['blog/index']) ?>"><?= Yii::t('app', 'Blog') ?></a>
                </li>
                <li<?= Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'contact' ? ' class="active"' : '' ?>>
                    <a href="<?= \yii\helpers\Url::to(['site/contact']) ?>"><?= Yii::t('app', 'Contact') ?></a>
                </li>
            </ul>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <?php foreach ($socials as $social): ?>
            <a target="_blank" href="<?= $social->name ?>"><img style="width: 16px"
                                                                src="<?= $social->getUploadUrl('icon') ?>"></a>
        <?php endforeach; ?>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> <?= $setting->email ?></li>
            <li><?= $setting->shipping_order ?></li>
        </ul>
    </div>
</div>
<!-- Humberger End -->