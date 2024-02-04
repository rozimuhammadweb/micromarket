<?php

use yii\helpers\Url;

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Url::to(['/']) ?>" class="brand-link">
        <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= Url::to(['/']) ?>" class="d-block"><?= Yii::$app->user->identity->first_name ?></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item <?= (Yii::$app->request->url === Url::to(['/category'])) ? 'btn-primary' : '' ?> ">
                    <a href="<?= \yii\helpers\Url::to(['/category']) ?>" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item <?= (Yii::$app->request->url === Url::to(['/product'])) ? 'btn-primary' : '' ?> ">
                    <a href="<?= \yii\helpers\Url::to(['/product']) ?>" class="nav-link">
                        <i class="fa fa-check-square ml-1 pr-2" aria-hidden="true"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= (Yii::$app->request->url === Url::to(['/blog'])) ? 'btn-primary' : '' ?> ">
                    <a href="<?= \yii\helpers\Url::to(['/blog']) ?>" class="nav-link">
                        <i class="fa fa-hashtag ml-1 pr-2" aria-hidden="true"></i>
                        <p>
                            Blog
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= (Yii::$app->request->url === Url::to(['/category-blog'])) ? 'btn-primary' : '' ?> ">
                    <a href="<?= \yii\helpers\Url::to(['/category-blog']) ?>" class="nav-link">
                        <i class="fa fa-clipboard ml-1 pr-2" aria-hidden="true"></i>
                        <p>
                            Blog Category
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= (Yii::$app->request->url === Url::to(['/tags'])) ? 'btn-primary' : '' ?> ">
                    <a href="<?= \yii\helpers\Url::to(['/tags']) ?>" class="nav-link">
                        <i class="fa fa-tags ml-1 pr-2"></i>
                        <p>
                            Tags
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= (Yii::$app->request->url === Url::to(['/translation'])) ? 'btn-primary' : '' ?> ">
                    <a href="<?= \yii\helpers\Url::to(['/translation']) ?>" class="nav-link">
                        <i class="fa fa-tags ml-1 pr-2"></i>
                        <p>
                            Translation
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= (Yii::$app->request->url === Url::to(['/setting'])) ? 'btn-primary' : '' ?> ">
                    <a href="<?= \yii\helpers\Url::to(['/setting']) ?>" class="nav-link">
                        <i class="fa fa fa-cogs ml-1 pr-2"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= (Yii::$app->request->url === Url::to(['/banner'])) ? 'btn-primary' : '' ?> ">
                    <a href="<?= \yii\helpers\Url::to(['/banner']) ?>" class="nav-link">
                        <i class="fa fa-address-card ml-1 pr-2" aria-hidden="true"></i>
                        <p>
                            Banner
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= (Yii::$app->request->url === Url::to(['/social'])) ? 'btn-primary' : '' ?> ">
                    <a href="<?= \yii\helpers\Url::to(['/social']) ?>" class="nav-link">
                        <i class="fa fa-address-card ml-1 pr-2" aria-hidden="true"></i>
                        <p>
                            Social Links
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>