<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span><?= Yii::t('app', 'categories') ?></span>
                    </div>
                    <ul style="display: none;">
                        <?php foreach ($categories as $category): ?>
                            <li>
                                <a href="<?= \yii\helpers\Url::to(['shop/index', 'category' => $category->id]) ?>"><?= $category->title ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <input type="text" placeholder="<?= Yii::t('app', 'need') ?>">
                            <button type="submit" class="site-btn"><?= Yii::t('app', 'search') ?></button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5><?= $setting->number ?></h5>
                            <span><?= Yii::t('app', 'support') ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>