<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*"><?= Yii::t('app', 'All') ?></li>
                        <?php foreach ($categories as $category): ?>
                            <li data-filter=".category_<?= $category->id ?>"><?= $category->title ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Updated feature section with modified product links -->
        <div class="row featured__filter">
            <?php foreach ($products as $product): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix category_<?= $product->category_id ?>">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?= $product->getImage('medium') ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['site/shop-detail', 'id' => $product->id]) ?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="<?= \yii\helpers\Url::to(['site/shop-detail', 'id' => $product->id]) ?>"><?= $product->title ?></a></h6>
                            <h5><?= number_format($product->price, 2) ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


    </div>
</section>
<!-- Featured Section End -->