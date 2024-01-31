<?php

/** @var \yii\web\View $this */

/** @var string $content */

use common\models\Category;
use common\models\Setting;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;

AppAsset::register($this);
$categories = Category::getCategories();
$setting = Setting::getSetting();
$socials = \common\models\Social::find()->all();
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <?php $this->beginBody(); ?>
    <body>
    <?= $this->render('hamburger', ['setting' => $setting, 'socials' => $socials]) ?>
    <?= $this->render('header', ['setting' => $setting, 'socials' => $socials]) ?>
    <?= $this->render('hero', ['categories' => $categories, 'setting' => $setting]) ?>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?= $content ?>
    <?= $this->render('footer', ['setting' => $setting, 'socials' => $socials]) ?>
    <?php $this->endBody(); ?>

    </body>
    </html>
<?php $this->endPage();
