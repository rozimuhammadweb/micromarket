<?php

use yii\helpers\Url;

?>
<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2><?= Yii::t('app', 'featured_product') ?></h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*"><?= Yii::t('app', 'all') ?></li>
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
                    <div class="featured__item" data-product-id="<?= $product->id ?>">
                        <div class="featured__item__pic set-bg" data-setbg="<?= $product->getImage('medium') ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a><i class="fa fa-heart"></i></a></li>
                                <li><a><i class="fa fa-shopping-cart"></i></a></li>
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
</section>
<!-- Featured Section End -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        $('.fa-shopping-cart').on('click', function (e) {
            e.preventDefault();
            var product_id = $(this).closest('.featured__item').data('product-id');
            console.log(product_id);
            $.ajax({
                type: 'POST',
                url: "<?= Url::to(['shop/add-to-cart']) ?>",
                data: {product_id: product_id},
                success: function (response) {
                    console.log("Add to Cart Success:", response);
                },
                error: function (error) {
                    console.error("Add to Cart Error:", error);

                    // Add this line to log the data being sent
                    console.log("Data sent:", {product_id: product_id});
                }
            });


        });
    });
</script>