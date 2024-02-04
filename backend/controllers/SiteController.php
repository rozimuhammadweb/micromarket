<?php

namespace backend\controllers;

use common\models\Category;
use common\models\LoginForm;
use common\models\Product;
use common\models\User;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login',],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'user', 'password'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $categories = Category::getCategories();
        $products = Product::getProducts();
        $latests = Product::getLatest();
        $reviews = Product::getRandProducts();
        return $this->render('index', [
            'categories' => $categories,
            'products' => $products,
            'latests' => $latests,
            'reviews' => $reviews,
        ]);
    }

    /**
     * @return string|Response
     */
    public function actionUser()
    {
        $id = Yii::$app->user->id;
        $model = User::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException('User not found.');
        }

        $model->scenario = 'profile';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Ma\'lumotlar yangilandi.');
            return $this->refresh();
        }

        return $this->render('user/user', ['model' => $model]);
    }

    /**
     * @return string|Response
     * @throws NotFoundHttpException
     */
    public function actionPassword()
    {
        $id = Yii::$app->user->id;
        $model = User::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException('User not found.');
        }

        $model->scenario = 'changePassword';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Parol muvaffaqiyatli yangilandi.');
            return $this->goBack();
        }

        return $this->render('user/password', ['model' => $model]);
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
