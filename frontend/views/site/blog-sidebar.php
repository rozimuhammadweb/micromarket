<?php


use common\models\Blog;
use common\models\CategoryBlog;
use common\models\Tags;

$tags = Tags::getTags();
$blogCategories = CategoryBlog::getCategoriesBlog();
$recentNews = Blog::getRecentNews();
?>

<div class="col-lg-4 col-md-5">
    <div class="blog__sidebar">
        <div class="blog__sidebar__search">
            <form action="#">
                <input type="text" placeholder="Search...">
                <button type="submit"><span class="icon_search"></span></button>
            </form>
        </div>
        <div class="blog__sidebar__item">
            <h4><?= Yii::t('app', 'Categories') ?></h4>
            <ul>
                <?php foreach ($blogCategories as $category): ?>
                    <li><a href="?category=<?= $category->id ?>"><?= $category->title ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="blog__sidebar__item">
            <h4><?= Yii::t('app', 'Recent News') ?></h4>
            <div class="blog__sidebar__recent">
                <?php foreach ($recentNews as $news): ?>
                    <a href="#" class="blog__sidebar__recent__item">
                        <div class="blog__sidebar__recent__item__pic">
                            <img style="width: 130px" src="<?= $news->getUploadUrl('imageFile') ?>" alt="">
                        </div>
                        <div class="blog__sidebar__recent__item__text">
                            <h6><?= $news->title ?></h6>
                            <span><?= Yii::$app->formatter->asDate($news->created_at, 'long') ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="blog__sidebar__item">
            <h4><?= Yii::t('app', 'Search By') ?></h4>
            <div class="blog__sidebar__item__tags">
                <?php foreach ($tags as $tag): ?>
                    <a href="?tags=<?= $tag->id ?>"><?= $tag->title ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>