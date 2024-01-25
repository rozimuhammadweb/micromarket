<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <?php foreach ($categories as $category): ?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?= $category->getUploadUrl('imageFile') ?>">
                            <h5>
                                <a href="<?= \yii\helpers\Url::to(['site/shop', 'category' => $category->id]) ?>"><?= $category->title ?></a>
                            </h5>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->