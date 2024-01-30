<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?= Yii::t('app', 'Blog') ?></h2>
                    <div class="breadcrumb__option">
                        <a href=""><?= Yii::t('app', 'Home') ?></a>
                        <span><?= Yii::t('app', 'Blog') ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <?= $this->render('blog-sidebar') ?>
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    <?php foreach ($blogs as $blog): ?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="<?= $blog->getUploadUrl('imageFile') ?>" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li>
                                            <i class="fa fa-calendar-o"></i> <?= Yii::$app->formatter->asDate($blog->created_at, 'long') ?>
                                        </li>
                                    </ul>
                                    <h5><a href="#"><?= $blog->title ?></a></h5>
                                    <p><?= $blog->short_description ?> </p>
                                    <a href="<?= \yii\helpers\Url::to(['blog/blog-detail', 'slug' => $blog->slug]) ?>"
                                       class="blog__btn"><?= Yii::t('app', 'READ MORE ') ?><span
                                                class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->