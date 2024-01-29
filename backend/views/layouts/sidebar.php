<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= \yii\helpers\Url::to(['/category']) ?>" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= \yii\helpers\Url::to(['/product']) ?>" class="nav-link">
                        <i class="fa fa-check-square ml-1 pr-2" aria-hidden="true"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= \yii\helpers\Url::to(['/blog']) ?>" class="nav-link">
                        <i class="fa fa-hashtag ml-1 pr-2" aria-hidden="true"></i>
                        <p>
                            Blog
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= \yii\helpers\Url::to(['/category-blog']) ?>" class="nav-link">
                        <i class="fa fa-clipboard ml-1 pr-2" aria-hidden="true"></i>
                        <p>
                            Blog Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= \yii\helpers\Url::to(['/tags']) ?>" class="nav-link">
                        <i class="fa fa-tags ml-1 pr-2"></i>
                        <p>
                            Tags
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= \yii\helpers\Url::to(['/translate-manager']) ?>" class="nav-link">
                        <i class="fa fa-tags ml-1 pr-2"></i>
                        <p>
                            Translation
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= \yii\helpers\Url::to(['/setting']) ?>" class="nav-link">
                        <i class="fa fa fa-cogs ml-1 pr-2"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= \yii\helpers\Url::to(['/banner']) ?>" class="nav-link">
                        <i class="fa fa-address-card ml-1 pr-2" aria-hidden="true"></i>
                        <p>
                            Banner
                        </p>
                    </a>
                </li>
                <li class="nav-item">
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