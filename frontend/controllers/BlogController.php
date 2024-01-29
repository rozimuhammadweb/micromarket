<?php

namespace frontend\controllers;


use common\models\Blog;
use common\models\CategoryBlog;
use common\models\Tags;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

class BlogController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }


    /**
     * @return string
     */
    public function actionIndex()
    {
        $blogCategoryFilter = Yii::$app->request->get('category');
        $blogsQuery = Blog::find()->orderBy(['id' => SORT_DESC]);

        if ($blogCategoryFilter) {
            $blogsQuery->andWhere(['category_id' => $blogCategoryFilter]);
        }
        $blogs = $blogsQuery->all();

        $tags = Tags::getTags();
        $blogCategories = CategoryBlog::getCategoriesBlog();
        $recentNews = Blog::getRecentNews();

        return $this->render('blog', [
            'blogCategories' => $blogCategories,
            'blogs' => $blogs,
            'recentNews' => $recentNews,
            'tags' => $tags,
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionBlogDetail($id)
    {
        $blog = Blog::findOne($id);
        return $this->render('blog-detail', [
            'blog' => $blog
        ]);
    }
}