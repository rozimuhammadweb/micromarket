<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Product;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

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
            $category = Category::findOne(['slug' => $categoryFilter]);
            if ($category) {
                $query->andWhere(['category_id' => $category->id]);
            }
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

    public function actionAddToCart()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $product_id = Yii::$app->request->post('product_id');
        $cart = Yii::$app->session->get('cart', []);
        $cart[] = $product_id;
        Yii::$app->session->set('cart', $cart);
        return ['success' => true];
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