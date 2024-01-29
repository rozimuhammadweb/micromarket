<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2><?= Yii::t('app', 'From The Blog') ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($blogs as $blog): ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
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
                            <h5>
                                <a href="<?= \yii\helpers\Url::to(['blog/blog-detail', 'id' => $blog->id]) ?>"><?= $blog->title ?></a>
                            </h5>
                            <p><?= $blog->short_description ?> </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Blog Section End -->