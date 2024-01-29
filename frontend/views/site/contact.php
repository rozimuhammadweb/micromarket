<?php


use common\models\MessageData;
use yii\bootstrap4\ActiveForm;

$model = new  MessageData();
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact Us</h2>
                        <div class="breadcrumb__option">
                            <a href="#">Home</a>
                            <span>Contact Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4><?= Yii::t('app', 'Phone') ?></h4>
                        <p><?= $setting->number ?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4><?= Yii::t('app', 'Address') ?></h4>
                        <p><?= $setting->address ?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4><?= Yii::t('app', 'Open time') ?></h4>
                        <p><?= $setting->working_time ?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4><?= Yii::t('app', 'Email') ?></h4>
                        <p><?= $setting->email ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe
                src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d56691.31171179592!2d71.53234030118958!3d40.42229269671443!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDDCsDI1JzAzLjEiTiA3McKwMzAnNTkuOCJF!5e0!3m2!1sen!2s!4v1705990204461!5m2!1sen!2s"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>New York</h4>
                <ul>
                    <li><?= Yii::t('app', 'Phone') ?>: <?= $setting->number ?></li>
                    <li><?= Yii::t('app', 'Address') ?>: <?= $setting->address ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Leave Message</h2>
                    </div>
                </div>
            </div>
            <?php $form = ActiveForm::begin(['id' => 'consultation-form', 'action' => ['consultation']]) ?>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Your Name'])->label(false) ?>
                </div>
                <div class="col-lg-6 col-md-6">
                    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Your Email',])->label(false) ?>
                </div>
                <div class="col-lg-12 text-center">
                    <?= $form->field($model, 'message')->textarea(['placeholder' => 'Your Message'])->label(false) ?>
                    <button type="submit" class="site-btn"><?= Yii::t('app', 'SEND MESSAGE') ?></button>
                </div>
            </div>
            <?php \yii\bootstrap4\ActiveForm::end() ?>
        </div>
    </div>
    <!-- Contact Form End -->
<?php
$js = <<< JS
 $(document).on('submit', '#consultation-form', function (e) {
    e.preventDefault();
    var form = $(this);

    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: form.serialize(),
        success: function (response) {
            if (response.success) {
                form[0].reset(); 
            } else {
                form.yiiActiveForm('updateMessages', response.message, true);
            }
        },
    });
});
JS;
$this->registerJs($js);
?>