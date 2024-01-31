<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Organi Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Department</h4>
                        <ul>
                            <?php foreach ($categories as $category): ?>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['shop/index', 'slug' => $category->slug]) ?>">
                                        <?= $category->title ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <h4>Price</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                 data-min="10" data-max="540">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Latest Products</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    <?php /** @var TYPE_NAME $latests */
                                    foreach ($latests as $latest): ?>
                                        <a href="<?= \yii\helpers\Url::to(['shop/shop-detail', 'slug' => $latest->slug]) ?>"
                                           class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?= $latest->getImage() ?>" alt="img">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?= $latest->title ?></h6>
                                                <span><?= number_format($latest->price, 2) ?></span>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="row">
                    <?php foreach ($products as $product): ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mix category_<?= $product->category_id ?>">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg"
                                     data-setbg="<?= $product->getImage('medium') ?>">
                                    <ul class="featured__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li>
                                            <a href="<?= \yii\helpers\Url::to(['shop/shop-detail', 'slug' => $product->slug]) ?>"><i
                                                        class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6>
                                        <a href="<?= \yii\helpers\Url::to(['shop/shop-detail', 'slug' => $product->slug]) ?>"><?= $product->title ?></a>
                                    </h6>
                                    <h5><?= number_format($product->price, 2) ?></h5>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->