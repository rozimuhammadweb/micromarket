<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="<?= \yii\helpers\Url::to(['/']) ?>"><img
                                    src="<?= $setting->getUploadUrl('imageFile') ?>" alt=""></a>
                    </div>
                    <ul>
                        <li><?= Yii::t('app', 'Address') ?>:<?= $setting->address ?></li>
                        <li><?= Yii::t('app', 'Phone') ?>: <?= $setting->number ?></li>
                        <li><?= Yii::t('app', 'Email') ?>: <?= $setting->email ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Useful Posts</h6>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">About Our Shop</a></li>
                        <li><a href="#">Secure Shopping</a></li>
                        <li><a href="#">Delivery infomation</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Our Sitemap</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6><?= Yii::t('app', 'social') ?></h6>
                    <div class="footer__widget__social mt-3">
                        <?php foreach ($socials as $social): ?>
                            <a target="_blank" href="<?= $social->name ?>"><img style="width: 18px "
                                                                src="<?= $social->getUploadUrl('icon') ?>"></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>