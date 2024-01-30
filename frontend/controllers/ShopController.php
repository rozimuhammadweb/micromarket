<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Product;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

class ShopController extends Controller
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

    public function actionIndex()
    {
        $categoryFilter = Yii::$app->request->get('slug');
        $query = Product::find();
        if ($categoryFilter) {
            $query->andWhere(['category_id' => $categoryFilter]);
        }
        $products = $query->orderBy(['id' => SORT_DESC])->all();

        $categories = Category::getCategories();
        $latests = Product::getLatest();
        return $this->render('shop', [
            'categories' => $categories,
            'products' => $products,
            'latests' => $latests,
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionShopDetail($slug)
    {
        $product = Product::findOne(['slug' => $slug]);
        return $this->render('shop-detail', [
            'product' => $product
        ]);
    }

    /**
     * @return string
     */
    public function actionShoppingCard()
    {
        return $this->render('shopping-card');
    }

    public function actionCheckout()
    {
        return $this->render('checkout');
    }
}