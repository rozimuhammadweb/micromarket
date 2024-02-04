<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4><?= Yii::t('app', 'latest') ?></h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <?php foreach ($latests as $latest): ?>
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
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4><?= Yii::t('app', 'top') ?></h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="/img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="/img/latest-product/lp-2.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="/img/latest-product/lp-3.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4><?= Yii::t('app', 'review') ?></h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <?php foreach ($reviews as $review): ?>
                                <a href="<?= \yii\helpers\Url::to(['shop/shop-detail', 'slug' => $review->slug]) ?>"
                                   class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?= $review->getImage() ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $review->title ?></h6>
                                        <span><?= number_format($review->price, 2) ?></span>
                                    </div>
                                </a>
                            <? endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->