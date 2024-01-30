<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-9">
                <div class="hero__item set-bg" data-setbg="<?= $banner->getUploadUrl('imageFile') ?>">
                    <div class="hero__text">
                        <span><?= $banner->name ?></span>
                        <h2><?= $banner->title ?></h2>
                        <p><?= $banner->subtitle ?></p>
                        <a href="<?= \yii\helpers\Url::to(['shop/index']) ?>"
                           class="primary-btn"><?= Yii::t('app', 'show_more') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->