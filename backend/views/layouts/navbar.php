<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link"></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                               aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Messages Dropdown Menu -->

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user mr-2"></i>
                <span class="hidden-xs "> admin</span>
                <i class="fas fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu" style="left: inherit;">
                <li class="user-footer">
                    <div class="d-flex justify-content-between">
                        <?php if (Yii::$app->user->isGuest) : ?>
                            <?= Html::tag('div', Html::a('Login', ['/site/login'], ['class' => ['btn btn-link login text-decoration-none']])) ?>
                        <?php else : ?>
                            <a class="btn btn-default btn-flat" href="<?= Url::to(['site/user']) ?>"><span
                                        class="fas fa-user-cog"></span> Profil</a>
                            <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex']) . Html::submitButton('<i class="fa fa-sign-out-alt"></i> (' . Yii::$app->user->identity->first_name . ')', ['class' => 'btn btn-default btn-flat logout text-decoration-none']) . Html::endForm(); ?>
                        <?php endif; ?>
                    </div>
                </li>
                <div class="d-flex justify-content-center pt-5 mt-5">
                    <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle w-25 " alt="User Image">
                </div>
                <li class="user-header bg-light">
                    <?php if (Yii::$app->user->isGuest) : ?>
                        <?= Html::tag('div', Html::a('Login', ['/site/login'], ['class' => ['text-decoration-none']])) ?>
                    <?php else : ?>
                        <?= Html::a(Yii::$app->user->identity->first_name, '#', ['class' => 'text-bold']) ?>
                    <?php endif; ?>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->